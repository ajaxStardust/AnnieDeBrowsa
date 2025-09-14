<?php

namespace P2u2\Model;

class P2u2
{
    public string $pathPassed;
    public array $pathComponents = [];
    public array $cleanedData = [];

    public function __construct(string $pathPassed = null)
    {
        // Default to DOCUMENT_ROOT if no path provided
        $this->pathPassed = $pathPassed ?? $_SERVER['DOCUMENT_ROOT'];
    }

    /**
     * Normalize the input path:
     * - Convert backslashes to slashes
     * - Trim spaces
     * - Replace spaces with %20
     */
    public function normalizePath(string $path): string
    {
        $path = str_replace('\\', '/', $path);       // Windows -> Unix style
        $path = trim($path);                          // Remove leading/trailing whitespace
        $path = preg_replace('/\s+/', '%20', $path); // Spaces -> %20
        return rtrim($path, '/');                     // Remove trailing slash
    }

    /**
     * Strip base paths (DOCUMENT_ROOT or optional array of base paths)
     * Returns path relative to web root
     */
    public function stripBasePaths(string $path, array $basePaths = []): string
    {
        // Always include DOCUMENT_ROOT as the first base
        array_unshift($basePaths, $_SERVER['DOCUMENT_ROOT']);
        foreach ($basePaths as $base) {
            $base = $this->normalizePath($base);
            if (str_starts_with($path, $base)) {
                $path = substr($path, strlen($base));
                break;
            }
        }
        return ltrim($path, '/'); // Remove leading slash
    }

    /**
     * Extract components from a path
     * Returns array of segments
     */
    public function extractComponents(string $path): array
    {
        $path = $this->normalizePath($path);
        $path = $this->stripBasePaths($path);
        $components = array_filter(explode('/', $path), fn($seg) => $seg !== '');
        $this->pathComponents = array_values($components);
        return $this->pathComponents;
    }

    /**
     * Build an HTTP URL from a system path
     * Optional $host and $scheme, default to current server
     */
    public function buildUrl(string $path, ?string $host = null, ?string $scheme = null): string
    {
        $host = $host ?? ($_SERVER['HTTP_HOST'] ?? 'localhost');
        $scheme = $scheme ?? ($_SERVER['REQUEST_SCHEME'] ?? 'http');

        $relativePath = $this->stripBasePaths($this->normalizePath($path));
        return $scheme . '://' . $host . '/' . $relativePath;
    }
}
