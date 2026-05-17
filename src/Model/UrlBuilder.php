<?php

namespace P2u2\Model;

/*
 * CONTRACT: UrlBuilder - Pure construction layer
 *
 * PROJECT CONTEXT:
 * Part of the refactored path-to-URL transformation pipeline in the Annie DeBrowsa SPA preview tool.
 * This class replaces tangled URL construction logic from legacy Newmethod.php.
 *
 * ROLE:
 * - Constructs URLs from normalized path components
 * - Applies host/server name information
 * - Handles protocol prefix (http:// vs https://)
 *
 * PRECONDITIONS:
 * - Input must be normalized path output from PathTransformer
 * - HTTP_HOST or SERVER_NAME must be available in $_SERVER
 * - normalizedData must contain 'components' and 'normalized_path' keys
 *
 * POSTCONDITIONS:
 * - build() MUST return array with 'url', 'path', 'components', 'host', 'protocol' keys
 * - url MUST be fully constructed with protocol and host
 * - components MUST be preserved for downstream evaluation
 *
 * CRITICAL INVARIANTS - DO NOT BREAK THESE:
 * 1. PURE CONSTRUCTION BOUNDARY
 *    • This class MUST NOT normalize paths or apply environment-specific cleanup
 *    • MUST NOT call PathTransformer or UrlEvaluator
 *    • VIOLATION breaks separation of concerns and reintroduces tangled logic
 * 2. RETURN STRUCTURE STABILITY
 *    • MUST return array with exact keys: url, path, components, host, protocol
 *    • MUST NOT change key names without updating all callers
 *    • VIOLATION breaks downstream UrlEvaluator and Main.page.php
 * 3. DRIVE LETTER HANDLING
 *    • MUST skip components matching /^\w:/ pattern (Windows drive letters)
 *    • MUST skip first two components (server root indicators)
 *    • VIOLATION causes malformed URLs with Windows paths included
 *
 * KNOWN ISSUES & TECHNICAL DEBT:
 * • buildPathFromComponents() has hardcoded logic to skip first 2 components
 *   - TEMPORARY: Preserves legacy behavior from Newmethod.php
 *   - FIX: Make component skipping logic configurable or rule-based
 * • Protocol defaults to 'http' - no automatic HTTPS detection
 *   - CONSTRAINT: Server configuration varies across environments
 *   - FIX: Add protocol detection based on SERVER_PORT or HTTPS flag
 *
 * FUTURE IMPROVEMENTS:
 * • Add automatic HTTPS detection based on $_SERVER['HTTPS'] or SERVER_PORT
 * • Make component skipping logic configurable via constructor parameter
 * • Add URL validation before returning constructed URL
 * • Support for custom URL patterns (e.g., subdomain routing)
 */

class UrlBuilder
{
    private string $protocol;
    private string $host;

    public function __construct(string $protocol = 'http', ?string $host = null)
    {
        $this->protocol = $protocol;
        $this->host = $host ?? ($_SERVER['HTTP_HOST'] ?? 'localhost');
    }

    /**
     * Build URL from normalized path components
     *
     * @param array $normalizedData Output from PathNormalizer::normalize()
     * @return array Array with 'url' and 'components' keys
     */
    public function build(array $normalizedData): array
    {
        $components = $normalizedData['components'];
        $normalizedPath = $normalizedData['normalized_path'];

        // Build URL from components
        $urlPath = $this->buildPathFromComponents($components);
        $fullUrl = $this->protocol . '://' . $this->host . '/' . ltrim($urlPath, '/');

        return [
            'url' => $fullUrl,
            'path' => $urlPath,
            'components' => $components,
            'host' => $this->host,
            'protocol' => $this->protocol
        ];
    }

    /**
     * Build path string from components
     */
    private function buildPathFromComponents(array $components): string
    {
        $path = '';
        foreach ($components as $index => $component) {
            // Skip drive letters and Windows-style paths (e.g., "C:")
            if (preg_match('/^\w:/', $component)) {
                continue;
            }

            // Skip first two components (typically server root indicators)
            if ($index < 2) {
                $path .= '/' . $component;
                break;
            }

            // Add remaining components
            $path .= '/' . $component;
        }

        return rtrim($path, '/');
    }

    /**
     * Set protocol (http or https)
     */
    public function setProtocol(string $protocol): void
    {
        $this->protocol = $protocol;
    }

    /**
     * Set host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }
}
