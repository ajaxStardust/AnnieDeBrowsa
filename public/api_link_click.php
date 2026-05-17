<?php

ini_set('display_errors', '0');
header('Content-Type: application/json');

require_once __DIR__ . '/../vendor/autoload.php';

use Adb\Model\Jsonconfigmanager;

function clickRespond(array $payload, int $status = 200): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    clickRespond(['error' => 'Method not allowed'], 405);
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$url = isset($data['url']) ? trim((string) $data['url']) : '';

if ($url === '') {
    clickRespond(['error' => 'Missing URL'], 400);
}

$configManager = new Jsonconfigmanager();
$result = $configManager->updateUrlCount($url);

if (!is_array($result) || empty($result['success'])) {
    clickRespond($result ?: ['error' => 'Unable to update count'], 422);
}

clickRespond($result);