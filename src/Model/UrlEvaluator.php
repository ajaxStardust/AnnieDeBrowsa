<?php

namespace P2u2\Model;

/*
 * CONTRACT: UrlEvaluator - Pure evaluation layer
 *
 * PROJECT CONTEXT:
 * Part of the refactored path-to-URL transformation pipeline in the Annie DeBrowsa SPA preview tool.
 * This class replaces tangled evaluation logic from legacy Evalpath.php.
 *
 * ROLE:
 * - Validates constructed URLs
 * - Applies server/host-specific rules and filtering
 * - Returns final validated URL
 *
 * PRECONDITIONS:
 * - Input must be constructed URL output from UrlBuilder
 * - HTTP_HOST or SERVER_NAME must be available in $_SERVER
 * - constructedData must contain 'url', 'components', 'protocol', 'host' keys
 *
 * POSTCONDITIONS:
 * - evaluate() MUST return array with 'valid', 'url', 'filtered_components', 'original_url', 'host' keys
 * - valid MUST be boolean indicating URL passed evaluation rules
 * - filtered_components MUST be array of components after host-based filtering
 *
 * CRITICAL INVARIANTS - DO NOT BREAK THESE:
 * 1. PURE EVALUATION BOUNDARY
 *    • This class MUST NOT normalize paths or construct URLs
 *    • MUST NOT call PathTransformer or UrlBuilder
 *    • VIOLATION breaks separation of concerns and reintroduces tangled logic
 * 2. RETURN STRUCTURE STABILITY
 *    • MUST return array with exact keys: valid, url, filtered_components, original_url, host
 *    • MUST NOT change key names without updating all callers
 *    • VIOLATION breaks downstream Main.page.php and Vue.js integration
 * 3. HOST FILTERING LOGIC
 *    • MUST filter components matching current host or 'www'
 *    • MUST skip drive letters (/^\w:/ pattern)
 *    • MUST preserve non-host-like components
 *    • VIOLATION causes incorrect URL filtering and broken links
 *
 * KNOWN ISSUES & TECHNICAL DEBT:
 * • isHostLike() has hardcoded list ['www', 'localhost', 'var', 'home']
 *   - TEMPORARY: Covers common host patterns but not extensible
 *   - FIX: Make host-like patterns configurable via config.json
 * • FILTER_VALIDATE_URL is basic validation - doesn't check URL accessibility
 *   - CONSTRAINT: Full accessibility check requires HTTP request
 *   - FIX: Add optional cURL-based validation for production
 *
 * FUTURE IMPROVEMENTS:
 * • Make host-like patterns configurable via config.json
 * • Add optional cURL-based URL accessibility validation
 * • Implement custom evaluation rules per domain preset
 * • Add support for URL rewriting rules (e.g., trailing slash normalization)
 */

class UrlEvaluator
{
    private string $currentHost;

    public function __construct(?string $currentHost = null)
    {
        $this->currentHost = $currentHost ?? ($_SERVER['HTTP_HOST'] ?? 'localhost');
    }

    /**
     * Evaluate and filter constructed URL based on host rules
     *
     * @param array $constructedData Output from UrlBuilder::build()
     * @return array Array with 'valid', 'url', and 'filtered_components' keys
     */
    public function evaluate(array $constructedData): array
    {
        $components = $constructedData['components'];
        $url = $constructedData['url'];

        // Filter components based on current host
        $filteredComponents = $this->filterByHost($components, $this->currentHost);

        // Rebuild URL with filtered components
        $filteredPath = implode('/', $filteredComponents);
        $filteredUrl = $constructedData['protocol'] . '://' . $constructedData['host'] . '/' . ltrim($filteredPath, '/');

        return [
            'valid' => $this->isValidUrl($filteredUrl),
            'url' => $filteredUrl,
            'filtered_components' => $filteredComponents,
            'original_url' => $url,
            'host' => $this->currentHost
        ];
    }

    /**
     * Filter components based on host matching
     */
    private function filterByHost(array $components, string $host): array
    {
        $filtered = [];
        $hostMatched = false;

        foreach ($components as $component) {
            // Check if component matches current host
            if ($component === $host || $component === 'www') {
                $hostMatched = true;
                continue;
            }

            // Skip drive letters and Windows-style paths
            if (preg_match('/^\w:/', $component)) {
                continue;
            }

            // Add component if host has been matched or if it's a path segment
            if ($hostMatched || !$this->isHostLike($component)) {
                $filtered[] = $component;
            }
        }

        return $filtered;
    }

    /**
     * Check if component looks like a host identifier
     */
    private function isHostLike(string $component): bool
    {
        // Check for common host patterns
        return in_array(strtolower($component), ['www', 'localhost', 'var', 'home']);
    }

    /**
     * Basic URL validation
     */
    private function isValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Set current host for evaluation
     */
    public function setCurrentHost(string $host): void
    {
        $this->currentHost = $host;
    }
}
