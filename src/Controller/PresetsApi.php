<?php
/**
 * PresetsApi Controller
 * 
 * Handles CRUD operations for domain presets stored in config.json
 * Provides JSON API endpoints for managing domain/subdomain combinations
 */

namespace Adb\Controller;

class PresetsApi
{
    private string $configPath;
    private array $config;

    public function __construct(string $configPath)
    {
        $this->configPath = $configPath;
        $this->loadConfig();
    }

    /**
     * Load configuration from config.json
     */
    private function loadConfig(): void
    {
        if (!file_exists($this->configPath)) {
            $this->config = ['domain_presets' => []];
            return;
        }

        $json = file_get_contents($this->configPath);
        $this->config = json_decode($json, true) ?? ['domain_presets' => []];

        if (!isset($this->config['domain_presets'])) {
            $this->config['domain_presets'] = [];
        }
    }

    /**
     * Save configuration back to config.json
     */
    private function saveConfig(): bool
    {
        $json = json_encode($this->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return file_put_contents($this->configPath, $json) !== false;
    }

    /**
     * Get all presets
     */
    public function getAll(): array
    {
        return $this->config['domain_presets'] ?? [];
    }

    /**
     * Get a specific preset by ID
     */
    public function getById(string $id): ?array
    {
        foreach ($this->config['domain_presets'] ?? [] as $preset) {
            if ($preset['id'] === $id) {
                return $preset;
            }
        }
        return null;
    }

    /**
     * Create a new preset
     */
    public function create(array $data): array
    {
        // Validate required fields
        if (empty($data['name']) || empty($data['server_name'])) {
            return ['error' => 'name and server_name are required'];
        }

        // Generate ID from name (lowercase, spaces to hyphens)
        $id = strtolower(preg_replace('/[^a-z0-9]+/', '-', $data['name']));
        $id = trim($id, '-');

        // Check for duplicate ID
        if ($this->getById($id)) {
            $id .= '-' . uniqid();
        }

        $preset = [
            'id' => $id,
            'name' => $data['name'],
            'subdomain' => $data['subdomain'] ?? '',
            'server_name' => $data['server_name'],
            'description' => $data['description'] ?? ''
        ];

        $this->config['domain_presets'][] = $preset;

        if ($this->saveConfig()) {
            return ['success' => true, 'preset' => $preset];
        }

        return ['error' => 'Failed to save configuration'];
    }

    /**
     * Update an existing preset
     */
    public function update(string $id, array $data): array
    {
        $found = false;

        foreach ($this->config['domain_presets'] ?? [] as &$preset) {
            if ($preset['id'] === $id) {
                $preset['name'] = $data['name'] ?? $preset['name'];
                $preset['subdomain'] = $data['subdomain'] ?? $preset['subdomain'];
                $preset['server_name'] = $data['server_name'] ?? $preset['server_name'];
                $preset['description'] = $data['description'] ?? $preset['description'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            return ['error' => 'Preset not found'];
        }

        if ($this->saveConfig()) {
            return ['success' => true, 'preset' => $preset];
        }

        return ['error' => 'Failed to save configuration'];
    }

    /**
     * Delete a preset by ID
     */
    public function delete(string $id): array
    {
        $initialCount = count($this->config['domain_presets'] ?? []);

        $this->config['domain_presets'] = array_filter(
            $this->config['domain_presets'] ?? [],
            fn($preset) => $preset['id'] !== $id
        );

        if (count($this->config['domain_presets']) === $initialCount) {
            return ['error' => 'Preset not found'];
        }

        // Re-index array
        $this->config['domain_presets'] = array_values($this->config['domain_presets']);

        if ($this->saveConfig()) {
            return ['success' => true];
        }

        return ['error' => 'Failed to save configuration'];
    }
}
