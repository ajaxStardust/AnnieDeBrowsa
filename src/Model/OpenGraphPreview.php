<?php

namespace Adb\Model;

class OpenGraphPreview
{
    public static function fetch(string $url): array
    {
        $normalizedUrl = self::normalizeUrl($url);

        if ($normalizedUrl === null) {
            return ['error' => 'Invalid URL'];
        }

        $html = self::fetchHtml($normalizedUrl);
        if ($html === null || $html === '') {
            return ['error' => 'Unable to fetch remote HTML'];
        }

        $metadata = self::parseHtml($html, $normalizedUrl);
        $metadata['url'] = $normalizedUrl;

        return $metadata;
    }

    private static function normalizeUrl(string $url): ?string
    {
        $url = trim($url);
        if ($url === '') {
            return null;
        }

        if (!preg_match('#^https?://#i', $url)) {
            $url = 'https://' . ltrim($url, '/');
        }

        return filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    private static function fetchHtml(string $url): ?string
    {
        if (function_exists('curl_init')) {
            $handle = curl_init($url);
            curl_setopt_array($handle, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_TIMEOUT => 8,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_USERAGENT => 'AnnieDeBrowsa/1.0 (+https://transformative.click)',
                CURLOPT_HTTPHEADER => [
                    'Accept: text/html,application/xhtml+xml',
                ],
            ]);

            $html = curl_exec($handle);
            $status = curl_getinfo($handle, CURLINFO_RESPONSE_CODE);
            curl_close($handle);

            if (is_string($html) && $status >= 200 && $status < 400) {
                return $html;
            }
        }

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => 8,
                'header' => "User-Agent: AnnieDeBrowsa/1.0 (+https://transformative.click)\r\nAccept: text/html,application/xhtml+xml\r\n",
            ],
            'ssl' => [
                'verify_peer' => true,
                'verify_peer_name' => true,
            ],
        ]);

        $html = @file_get_contents($url, false, $context);
        return is_string($html) ? $html : null;
    }

    private static function parseHtml(string $html, string $baseUrl): array
    {
        $metadata = [
            'og_title' => '',
            'og_image' => '',
            'og_description' => '',
            'og_site_name' => '',
        ];

        libxml_use_internal_errors(true);
        $document = new \DOMDocument();
        @$document->loadHTML($html);
        $xpath = new \DOMXPath($document);
        libxml_clear_errors();

        $metadata['og_title'] = self::queryMeta($xpath, 'property', 'og:title')
            ?: self::queryMeta($xpath, 'name', 'twitter:title')
            ?: self::documentTitle($xpath);

        $image = self::queryMeta($xpath, 'property', 'og:image')
            ?: self::queryMeta($xpath, 'name', 'twitter:image');
        $metadata['og_image'] = self::absolutizeUrl($image, $baseUrl);

        $metadata['og_description'] = self::queryMeta($xpath, 'property', 'og:description')
            ?: self::queryMeta($xpath, 'name', 'description')
            ?: self::queryMeta($xpath, 'name', 'twitter:description');

        $metadata['og_site_name'] = self::queryMeta($xpath, 'property', 'og:site_name');

        return $metadata;
    }

    private static function queryMeta(\DOMXPath $xpath, string $attribute, string $value): string
    {
        $nodes = $xpath->query(sprintf("//meta[translate(@%s, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz')='%s']/@content", $attribute, strtolower($value)));
        if ($nodes instanceof \DOMNodeList && $nodes->length > 0) {
            return trim($nodes->item(0)->nodeValue);
        }

        return '';
    }

    private static function documentTitle(\DOMXPath $xpath): string
    {
        $nodes = $xpath->query('//title');
        if ($nodes instanceof \DOMNodeList && $nodes->length > 0) {
            return trim($nodes->item(0)->textContent);
        }

        return '';
    }

    private static function absolutizeUrl(string $candidate, string $baseUrl): string
    {
        $candidate = trim($candidate);
        if ($candidate === '') {
            return '';
        }

        if (preg_match('#^https?://#i', $candidate)) {
            return $candidate;
        }

        $base = parse_url($baseUrl);
        if (!is_array($base) || empty($base['scheme']) || empty($base['host'])) {
            return $candidate;
        }

        $scheme = $base['scheme'];
        $host = $base['host'];
        $port = isset($base['port']) ? ':' . $base['port'] : '';

        if (strpos($candidate, '//') === 0) {
            return $scheme . ':' . $candidate;
        }

        if (strpos($candidate, '/') === 0) {
            return $scheme . '://' . $host . $port . $candidate;
        }

        $basePath = $base['path'] ?? '/';
        $baseDir = rtrim(str_replace('\\', '/', dirname($basePath)), '/');
        return $scheme . '://' . $host . $port . ($baseDir !== '' ? $baseDir : '') . '/' . ltrim($candidate, '/');
    }
}