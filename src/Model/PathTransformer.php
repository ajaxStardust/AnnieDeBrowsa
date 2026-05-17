<?php

namespace P2u2\Model;

/*
 * CONTRACT: PathTransformer - Pure normalization layer
 *
 * PROJECT CONTEXT:
 * Part of the refactored path-to-URL transformation pipeline in the Annie DeBrowsa SPA preview tool.
 * This class replaces tangled normalization logic from legacy P2u2.php.
 *
 * ROLE:
 * - Normalizes filesystem paths to URL-ready components
 * - Removes protocol prefixes, normalizes separators, strips server roots
 * - Extracts path components for downstream construction
 *
 * PRECONDITIONS:
 * - Input may be filesystem path, file:// path, or environment-specific dev path
 * - config.json must exist at dirname($_SERVER['SCRIPT_FILENAME']) . '/config.json'
 *
 * POSTCONDITIONS:
 * - normalize() MUST return array with 'normalized_path' and 'components' keys
 * - components MUST be array of path segments extracted via regex
 * - normalized_path MUST be free of protocol prefixes and server root paths
 *
 * CRITICAL INVARIANTS - DO NOT BREAK THESE:
 * 1. PURE NORMALIZATION BOUNDARY
 *    • This class MUST NOT construct URLs or apply host-specific logic
 *    • MUST NOT call UrlBuilder or UrlEvaluator
 *    • VIOLATION breaks separation of concerns and reintroduces tangled logic
 * 2. CONFIG JSON INTEGRATION
 *    • MUST load domain_presets from config.json if file exists
 *    • MUST handle missing config.json gracefully (return empty array)
 *    • VIOLATION causes runtime errors in environments without config.json
 * 3. COMPONENT EXTRACTION CONSISTENCY
 *    • MUST use regex pattern /(?:^|\/)([^\/]+)/ for extraction
 *    • MUST return array or empty array, never null
 *    • VIOLATION breaks downstream UrlBuilder which expects array input
 *
 * KNOWN ISSUES & TECHNICAL DEBT:
 * • applyConfigMappings() constructs full URLs (http:// prefix) - this violates pure normalization
 *   - TEMPORARY: Kept for backward compatibility with existing config.json structure
 *   - FIX: Move URL construction to UrlBuilder, keep only path mapping here
 * • Hardcoded WSL distro names (Debian, kali-rolling) - not extensible
 *   - CONSTRAINT: WSL normalization is environment-specific
 *   - FIX: Make WSL patterns configurable via config.json
 *
 * FUTURE IMPROVEMENTS:
 * • Extract URL construction from applyConfigMappings() to maintain pure normalization
 * • Add support for custom normalization rules via config.json
 * • Implement caching for config.json to avoid repeated file reads
 */

class PathTransformer
{
    private string $configPath;
    private array $config;
    private array $commonPaths = [
        '/var/www/html',
        '/var/www/htdocs',
        '/var/www/public_html',
        '/var/www/htdocs/public_html',
        '/www/wwwroot',
        '/home/admin/web',
        '/opt/lampp/htdocs'
    ];

    public function __construct(?string $configPath = null)
    {
        $this->configPath = $configPath ?? dirname($_SERVER['SCRIPT_FILENAME']) . '/config.json';
        $this->loadConfig();
    }

    /**
     * Load configuration from config.json for custom path mappings
     */
    private function loadConfig(): void
    {
        if (!file_exists($this->configPath)) {
            $this->config = [];
            return;
        }

        $json = file_get_contents($this->configPath);
        $this->config = json_decode($json, true) ?? [];
    }

    /**
     * Normalize a filesystem path to URL-ready components
     *
     * @param string $path Raw filesystem path
     * @return array Array with 'normalized_path' and 'components' keys
     */
    public function normalize(string $path): array
    {
        $normalized = $this->removeProtocolPrefixes($path);
        $normalized = $this->normalizeWslPaths($normalized);
        $normalized = $this->stripServerRoots($normalized);
        $normalized = $this->normalizeSeparators($normalized);
        $normalized = $this->encodeSpaces($normalized);
        $normalized = $this->applyConfigMappings($normalized);
        $components = $this->extractComponents($normalized);

        return [
            'normalized_path' => $normalized,
            'components' => $components,
            'original_path' => $path
        ];
    }

    /**
     * Remove protocol prefixes
     */
    private function removeProtocolPrefixes(string $path): string
    {
        $path = str_ireplace('ftp(4000):', '', $path);
        $path = str_ireplace('file://', '', $path);
        return $path;
    }

    /**
     * Normalize WSL-specific paths
     */
    private function normalizeWslPaths(string $path): string
    {
        $path = str_ireplace('wsl.localhost\Debian', 'localhost', $path);
        $path = str_ireplace('wsl.localhost\kali-rolling', 'localhost', $path);
        $path = str_ireplace('wsl.localhost\[DistroName]', '', $path);
        return $path;
    }

    /**
     * Strip common server root paths
     */
    private function stripServerRoots(string $path): string
    {
        foreach ($this->commonPaths as $rootPath) {
            $path = str_ireplace($rootPath, '', $path);
        }
        $path = str_ireplace('public_html', '', $path);
        return $path;
    }

    /**
     * Normalize path separators to forward slashes
     */
    private function normalizeSeparators(string $path): string
    {
        $path = preg_replace('@([\x5c\x2f]+)@', '/', $path);
        $path = preg_replace('/"/', '', $path);
        return rtrim($path);
    }

    /**
     * URL-encode spaces
     */
    private function encodeSpaces(string $path): string
    {
        return preg_replace('/ /', '%20', $path);
    }

    /**
     * Apply custom path mappings from config.json
     */
    private function applyConfigMappings(string $path): string
    {
        if (empty($this->config['domain_presets'])) {
            return $path;
        }

        foreach ($this->config['domain_presets'] as $preset) {
            if (!isset($preset['server_name'])) {
                continue;
            }

            $pattern = str_replace('\\', '\\\\', $preset['server_name']);
            if (preg_match('@' . $pattern . '\/([^\/]+)@', $path, $matches)) {
                $basename = basename($path);
                $path = 'http://' . $preset['server_name'] . '/' . $basename;
                break;
            }
        }

        return $path;
    }

    /**
     * Extract path components using regex
     */
    private function extractComponents(string $path): array
    {
        $pattern = '/(?:^|\/)([^\/]+)/';
        preg_match_all($pattern, $path, $matches);
        return $matches[1] ?? [];
    }
}
