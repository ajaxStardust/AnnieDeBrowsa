<?php
header('Content-Type: application/json');

// Adjust this path to the actual config.json location
define('CONFIG_FILE', realpath(__DIR__ . '/../config.json'));

// Read existing config
function loadConfig() {
    if (!file_exists(CONFIG_FILE)) {
        http_response_code(500);
        echo json_encode(['error' => 'Config file not found']);
        exit;
    }
    $json = file_get_contents(CONFIG_FILE);
    return json_decode($json, true);
}

// Save config back to file
function saveConfig($data) {
    $json = json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents(CONFIG_FILE, $json) === false) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed. CHMOD to write to config.json']);
        exit;
    }
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Return JSON config
    $config = loadConfig();
    echo json_encode($config);
    exit;
}

if ($method === 'POST') {
    // Receive JSON payload
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!is_array($data) || !isset($data['home_urls'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        exit;
    }

    // Optional: Validate structure of each home_url here

    saveConfig($data);

    echo json_encode(['success' => true, 'updated' => $data]);
    exit;
}

http_response_code(405);
echo json_encode(['error' => 'Method not allowed']);
exit;
