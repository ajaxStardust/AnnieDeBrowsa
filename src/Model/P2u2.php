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
<<<<<<< HEAD
        if(!is_array($this->clean_chars)){
            $this->clean_chars = [];
        }
        $this->clean_chars['input_string'] = $url_2_convert;
        $this->clean_chars['url_2_convert'] = $this->clean_chars['input_string'];
        $this->clean_chars['url_2_convert'] = str_ireplace('ftp(4000):', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('file://', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('wsl.localhost\Debian', 'localhost', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('wsl.localhost\kali-rolling', 'localhost', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = str_ireplace('wsl.localhost\[DistroName]', '', $this->clean_chars['url_2_convert']);
        // dev env specific note where '/media/wd2tb01' is reference to where my development server is on LAN. 
        // Learn from this here how to mod for your setup.
        $this->clean_chars['url_2_convert'] = str_ireplace('/media/wd2tb01', '', $this->clean_chars['url_2_convert']);        
        $this->clean_chars['url_2_convert'] = preg_replace('@([\x5c\x2f]+)@', '/', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = preg_replace('/"/', '', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = preg_replace('/ /', '%20', $this->clean_chars['url_2_convert']);
        $this->clean_chars['url_2_convert'] = rtrim($this->clean_chars['url_2_convert']);
        if (preg_match('/\/mxuni\/www\/([^\/]+)\//', $this->clean_chars['url_2_convert'], $matches)) {
            $this->clean_chars['server_name'] = 'mxuni';  // Default server name
            $this->clean_chars['third_level_dir'] = $matches[1];
            $this->clean_chars['full_server_name'] = (
                $this->clean_chars['third_level_dir'] !== $this->clean_chars['server_name']
            ) ? $this->clean_chars['third_level_dir'] . '.' . $this->clean_chars['server_name'] : $this->clean_chars['server_name'];
            // Extract the filename
            $this->clean_chars['basename'] = basename($this->clean_chars['url_2_convert']);
            $this->clean_chars['url_converted'] = $this->clean_chars['full_server_name'] . '/' . $this->clean_chars['basename'];
            // Construct the processed URL
            $this->clean_chars['processed_url'] = '/' . $this->clean_chars['full_server_name'] . '/' . $this->clean_chars['basename'];
            $this->clean_chars['url_2_convert'] = $this->clean_chars['processed_url'];
        }

        $this->clean_chars['config_file'] = dirname($_SERVER['SCRIPT_FILENAME']) . '/config.json';
        $this->clean_chars['config_data'] = file_get_contents($this->clean_chars['config_file']);
        $this->clean_chars['config_data'] = json_decode($this->clean_chars['config_data']);
        $this->clean_chars['config_data'] = json_encode($this->clean_chars['config_data']);

        $fes = 0;
        if (is_array($this->clean_chars['config_data'])) {
            foreach ($this->clean_chars['config_data'] as $server => $data) {
                $pattern = str_replace('\\', '\\\\', $data);  // Escape backslashes for regex
                if (preg_match('@' . $pattern . '\/([^\/]+)@', $this->clean_chars['url_2_convert'], $matches)) {
                    $this->clean_chars['server_name'] = $server[$fes];
                    $this->clean_chars['third_level_dir'] = $matches[1];
                    $this->clean_chars['full_server_name'] = ($this->clean_chars['third_level_dir'] !== $this->clean_chars['server_name']) ? $this->clean_chars['third_level_dir'] . '.' . $this->clean_chars['server_name'] : $this->clean_chars['server_name'];
                    // Extract the filename and construct the processed URL
                    $this->clean_chars['basename'] = basename($this->clean_chars['url_2_convert']);
                    $this->clean_chars['processed_url'] = 'https://' . $this->clean_chars['full_server_name'] . '/' . $this->clean_chars['basename'];
                    $this->clean_chars['url_2_convert'] = $this->clean_chars['processed_url'];
                    // No need to continue matching if a match is found
                    break;
                }
                $fes++;
=======
        // Always include DOCUMENT_ROOT as the first base
        array_unshift($basePaths, $_SERVER['DOCUMENT_ROOT']);
        foreach ($basePaths as $base) {
            $base = $this->normalizePath($base);
            if (str_starts_with($path, $base)) {
                $path = substr($path, strlen($base));
                break;
>>>>>>> 0e25e3bfb504a2e99fbd26c708759fca59e12c97
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
