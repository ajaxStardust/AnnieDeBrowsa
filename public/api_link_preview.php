<?php

ini_set('display_errors', '0');
header('Content-Type: application/json');

require_once __DIR__ . '/../src/Model/OpenGraphPreview.php';

use Adb\Model\OpenGraphPreview;

function previewRespond(array $payload, int $status = 200): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET') {
    previewRespond(['error' => 'Method not allowed'], 405);
}

$url = isset($_GET['url']) ? (string) $_GET['url'] : '';
if ($url === '') {
    previewRespond(['error' => 'Missing url parameter'], 400);
}

$metadata = OpenGraphPreview::fetch($url);
if (isset($metadata['error'])) {
    previewRespond($metadata, 422);
}

previewRespond($metadata);