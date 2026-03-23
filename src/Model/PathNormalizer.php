<?php

namespace Adb\Model;

/**
 * PathNormalizer: Handle environment-specific path variations
 *
 * Normalizes paths across different hosting environments:
 * - /www/wwwroot/transformative.lan → transformative.lan
 * - /home/admin/web/transformative.click/public_html → transformative.click
 * - /var/www/domain.tld → domain.tld
 */
class PathNormalizer
{
    /**
     * Extract the meaningful domain/project name from a filesystem path
     *
     * @param string $path Full filesystem path
     * @return string Project name (e.g., "transformative.lan", "transformative.click")
     */
    public static function extractProjectName($path = null)
    {
        if ($path === null) {
            $path = dirname(__DIR__, 2); // Default to install root
        }

        $path = rtrim($path, '/\\');
        $normalizedPath = str_replace('\\', '/', $path);

        if (preg_match('#^/home/[^/]+/web/([^/]+)/public_html(?:/.*)?$#i', $normalizedPath, $matches)) {
            return $matches[1];
        }

        if (preg_match('#^/www/wwwroot/([^/]+)(?:/.*)?$#i', $normalizedPath, $matches)) {
            return $matches[1];
        }

        if (preg_match('#^/var/www/(?:htdocs/)?([^/]+)(?:/public_html)?(?:/.*)?$#i', $normalizedPath, $matches)) {
            return $matches[1];
        }

        // Fallback to basename or SERVER_NAME
        return basename($path) ?: ($_SERVER['SERVER_NAME'] ?? 'localhost');
    }

    /**
     * Convert an absolute filesystem path to a project-relative display path.
     *
     * Examples:
     * - /www/wwwroot/transformative.lan/src/View/Main.page.php -> /transformative.lan/src/View/Main.page.php
     * - /home/admin/web/transformative.click/public_html/src/View/Main.page.php -> /transformative.click/src/View/Main.page.php
     */
    public static function normalizeDisplayPath($path)
    {
        $path = rtrim((string) $path, '/\\');
        $normalizedPath = str_replace('\\', '/', $path);
        $projectName = self::extractProjectName($normalizedPath);

        if (preg_match('#^/home/[^/]+/web/[^/]+/public_html(?:/(.*))?$#i', $normalizedPath, $matches)) {
            $suffix = isset($matches[1]) && $matches[1] !== '' ? '/' . ltrim($matches[1], '/') : '';
            return '/' . $projectName . $suffix;
        }

        if (preg_match('#^/www/wwwroot/[^/]+(?:/(.*))?$#i', $normalizedPath, $matches)) {
            $suffix = isset($matches[1]) && $matches[1] !== '' ? '/' . ltrim($matches[1], '/') : '';
            return '/' . $projectName . $suffix;
        }

        if (preg_match('#^/var/www/(?:htdocs/)?[^/]+(?:/public_html)?(?:/(.*))?$#i', $normalizedPath, $matches)) {
            $suffix = isset($matches[1]) && $matches[1] !== '' ? '/' . ltrim($matches[1], '/') : '';
            return '/' . $projectName . $suffix;
        }

        return $normalizedPath;
    }

    public static function normalizeDisplayPathFromRoot($rootPath, $fullPath)
    {
        $rootPath = rtrim(str_replace('\\', '/', (string) $rootPath), '/');
        $fullPath = str_replace('\\', '/', (string) $fullPath);

        if ($rootPath !== '' && strpos($fullPath, $rootPath) === 0) {
            $relativePath = ltrim(substr($fullPath, strlen($rootPath)), '/');
            $projectName = self::extractProjectName($rootPath);
            return '/' . $projectName . ($relativePath !== '' ? '/' . $relativePath : '');
        }

        return self::normalizeDisplayPath($fullPath);
    }

    /**
     * Normalize SVG/asset base URL for different environments
     *
     * @return string Base path for assets (usually /public or /public_html)
     */
    public static function getAssetBasePath()
    {
        // Get the public_html or public directory path
        if (file_exists(dirname(__DIR__, 2) . '/public_html')) {
            return '/public_html';
        } elseif (file_exists(dirname(__DIR__, 2) . '/public')) {
            return '/public';
        }

        // Fallback
        return '/public';
    }
}
