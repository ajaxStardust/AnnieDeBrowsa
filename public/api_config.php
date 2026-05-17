<?php
ini_set('display_errors', '0');
header('Content-Type: application/json');

// Adjust this path to the actual config.json location
define('CONFIG_FILE', realpath(__DIR__ . '/../config.json'));

function respondJson(array $payload, int $status = 200): void {
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

// Read existing config
function loadConfig() {
    if (CONFIG_FILE === false) {
        respondJson(['error' => 'Config path resolution failed'], 500);
    }

    if (!file_exists(CONFIG_FILE)) {
        respondJson(['error' => 'Config file not found'], 500);
    }

    $json = @file_get_contents(CONFIG_FILE);
    if ($json === false) {
        respondJson(['error' => 'Unable to read config file'], 500);
    }

    $decoded = json_decode($json, true);
    if (!is_array($decoded)) {
        respondJson(['error' => 'Config JSON is invalid or malformed'], 500);
    }

    return $decoded;
}

// Save config back to file
function saveConfig($data) {
    if (CONFIG_FILE === false) {
        respondJson(['error' => 'Config path resolution failed'], 500);
    }

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    if ($json === false) {
        respondJson(['error' => 'Failed to encode config JSON'], 500);
    }

    if (file_exists(CONFIG_FILE) && !is_writable(CONFIG_FILE)) {
        respondJson(['error' => 'Config file is not writable. Check file permissions.'], 500);
    }

    if (!file_exists(CONFIG_FILE) && !is_writable(dirname(CONFIG_FILE))) {
        respondJson(['error' => 'Config directory is not writable. Check directory permissions.'], 500);
    }

    if (@file_put_contents(CONFIG_FILE, $json, LOCK_EX) === false) {
        respondJson(['error' => 'Failed to write config.json. Check CHMOD/ownership.'], 500);
    }
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Return JSON config
    $config = loadConfig();
    respondJson($config);
}

if ($method === 'POST') {
    // Receive JSON payload
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!is_array($data) || !isset($data['home_urls'])) {
        respondJson(['error' => 'Invalid input'], 400);
    }

    // Optional: Validate structure of each home_url here

    saveConfig($data);

    respondJson(['success' => true, 'updated' => $data]);
}

respondJson(['error' => 'Method not allowed'], 405);
