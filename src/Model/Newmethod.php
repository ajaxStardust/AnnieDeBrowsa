<?php

namespace P2u2\Model;

use P2u2\Model\P2u2;

class Newmethod
{
    private P2u2 $p2u2;
    public array $processingResults = [];
    public string $pathPassed;

    public function __construct(?string $pathPassed = null)
    {
        $this->pathPassed = $pathPassed ?? $_SERVER['DOCUMENT_ROOT'];
        $this->p2u2 = new P2u2($this->pathPassed);
    }

    /**
     * Build URL processing results
     * Returns an array suitable for rendering in Trypath/Twerkin forms
     */
    public function buildUrl(?string $enterPath = null): array
    {
        $enterPath = $enterPath ?? $this->pathPassed;

        // 1. Normalize path
        $normalized = $this->p2u2->normalizePath($enterPath);
        $this->processingResults['normalized'] = $normalized;

        // 2. Extract components
        $components = $this->p2u2->extractComponents($normalized);
        $this->processingResults['components'] = $components;

        // 3. Build URLs
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';

        // Build the three types of URLs for display
        // a) buildByComp: direct concatenation of components
        $buildByComp = $this->p2u2->buildUrl($enterPath, $host, $scheme);
        $this->processingResults['buildByComp'] = $buildByComp;

        // b) concatThis: strip common base paths for relative URL
        $commonPaths = [
            '/opt/lampp/htdocs',
            '/var/www/html',
            '/var/www/htdocs',
            '/var/www/public_html',
            '/var/www/htdocs/public_html',
            '/var/www/wwwroot',
            '/home/admin/web',
        ];
        $relativePath = $this->p2u2->stripBasePaths($normalized, $commonPaths);
        $concatThis = rtrim($scheme . '://' . $host . '/' . $relativePath, '/');
        $this->processingResults['concatThis'] = $concatThis;

        // c) concatSwitch: just scheme + host
        $concatSwitch = $scheme . '://' . $host . '/';
        $this->processingResults['concatSwitch'] = $concatSwitch;

        return $this->processingResults;
    }

    /**
     * Optionally, build the last URL for display purposes
     */
    public function buildUrlLast(string $path): string
    {
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';
        $relativePath = $this->p2u2->stripBasePaths($path);
        $url = $scheme . '://' . $host . '/' . $relativePath;
        $this->processingResults['lastUrl'] = $url;
        return $url;
    }
}
