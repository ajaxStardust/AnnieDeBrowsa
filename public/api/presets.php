<?php
/**
 * API Endpoint: /public/api/presets.php
 * 
 * RESTful JSON API for domain presets management
 * Handles GET, POST, PUT, DELETE requests for preset CRUD operations
 * 
 * Usage:
 *   GET  /public/api/presets.php - Get all presets
 *   POST /public/api/presets.php - Create new preset
 *   PUT  /public/api/presets.php?id=local-dev - Update preset
 *   DELETE /public/api/presets.php?id=local-dev - Delete preset
 */

// Set headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Bootstrap
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Adb\Controller\PresetsApi;

$configPath = dirname(__DIR__) . '/config.json';
$api = new PresetsApi($configPath);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

try {
    switch ($method) {
        case 'GET':
            // Get all presets or single preset by ID
            if ($id) {
                $preset = $api->getById($id);
                if ($preset) {
                    http_response_code(200);
                    echo json_encode($preset);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Preset not found']);
                }
            } else {
                http_response_code(200);
                echo json_encode(['presets' => $api->getAll()]);
            }
            break;

        case 'POST':
            // Create new preset
            $data = json_decode(file_get_contents('php://input'), true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid JSON']);
                break;
            }

            $result = $api->create($data);

            if (isset($result['error'])) {
                http_response_code(400);
            } else {
                http_response_code(201);
            }

            echo json_encode($result);
            break;

        case 'PUT':
            // Update existing preset
            if (!$id) {
                http_response_code(400);
                echo json_encode(['error' => 'id parameter required']);
                break;
            }

            $data = json_decode(file_get_contents('php://input'), true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid JSON']);
                break;
            }

            $result = $api->update($id, $data);

            if (isset($result['error'])) {
                http_response_code(400);
            } else {
                http_response_code(200);
            }

            echo json_encode($result);
            break;

        case 'DELETE':
            // Delete preset
            if (!$id) {
                http_response_code(400);
                echo json_encode(['error' => 'id parameter required']);
                break;
            }

            $result = $api->delete($id);

            if (isset($result['error'])) {
                http_response_code(404);
            } else {
                http_response_code(200);
            }

            echo json_encode($result);
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
