#!/usr/bin/env php
<?php
/**
 * Integration Test: Domain Presets API
 * 
 * Tests CRUD operations on the presets API
 * Run from command line: php test-presets-api.php
 */

require_once __DIR__ . '/vendor/autoload.php';

use Adb\Controller\PresetsApi;

class PresetsTester
{
    private PresetsApi $api;
    private array $testResults = [];

    public function __construct(string $configPath)
    {
        $this->api = new PresetsApi($configPath);
    }

    public function run(): void
    {
        echo "\n╔════════════════════════════════════════════════╗\n";
        echo "║   Domain Presets API Integration Tests       ║\n";
        echo "╚════════════════════════════════════════════════╝\n\n";

        $this->testGetAll();
        $this->testCreate();
        $this->testUpdate();
        $this->testDelete();

        $this->printResults();
    }

    private function testGetAll(): void
    {
        echo "🔹 Testing: Get All Presets\n";
        try {
            $presets = $this->api->getAll();
            $count = count($presets);
            echo "   ✅ Retrieved $count presets\n";
            $this->testResults['Get All'] = true;
        } catch (Exception $e) {
            echo "   ❌ Error: {$e->getMessage()}\n";
            $this->testResults['Get All'] = false;
        }
    }

    private function testCreate(): void
    {
        echo "\n🔹 Testing: Create Preset\n";
        try {
            $result = $this->api->create([
                'name' => 'Test Preset',
                'subdomain' => 'test',
                'server_name' => 'test.local',
                'description' => 'Test preset for integration testing'
            ]);

            if (isset($result['error'])) {
                echo "   ❌ Error: {$result['error']}\n";
                $this->testResults['Create'] = false;
            } else {
                echo "   ✅ Created preset: {$result['preset']['id']}\n";
                $this->testResults['Create'] = true;
                $this->testResults['created_id'] = $result['preset']['id'];
            }
        } catch (Exception $e) {
            echo "   ❌ Error: {$e->getMessage()}\n";
            $this->testResults['Create'] = false;
        }
    }

    private function testUpdate(): void
    {
        echo "\n🔹 Testing: Update Preset\n";

        if (!isset($this->testResults['created_id'])) {
            echo "   ⏭️  Skipped (no created preset)\n";
            return;
        }

        try {
            $id = $this->testResults['created_id'];
            $result = $this->api->update($id, [
                'name' => 'Updated Test Preset',
                'subdomain' => 'updated'
            ]);

            if (isset($result['error'])) {
                echo "   ❌ Error: {$result['error']}\n";
                $this->testResults['Update'] = false;
            } else {
                echo "   ✅ Updated preset: {$id}\n";
                echo "   New name: {$result['preset']['name']}\n";
                $this->testResults['Update'] = true;
            }
        } catch (Exception $e) {
            echo "   ❌ Error: {$e->getMessage()}\n";
            $this->testResults['Update'] = false;
        }
    }

    private function testDelete(): void
    {
        echo "\n🔹 Testing: Delete Preset\n";

        if (!isset($this->testResults['created_id'])) {
            echo "   ⏭️  Skipped (no created preset)\n";
            return;
        }

        try {
            $id = $this->testResults['created_id'];
            $result = $this->api->delete($id);

            if (isset($result['error'])) {
                echo "   ❌ Error: {$result['error']}\n";
                $this->testResults['Delete'] = false;
            } else {
                echo "   ✅ Deleted preset: {$id}\n";
                $this->testResults['Delete'] = true;
            }
        } catch (Exception $e) {
            echo "   ❌ Error: {$e->getMessage()}\n";
            $this->testResults['Delete'] = false;
        }
    }

    private function printResults(): void
    {
        echo "\n╔════════════════════════════════════════════════╗\n";
        echo "║                 Test Results                  ║\n";
        echo "╚════════════════════════════════════════════════╝\n\n";

        $passed = 0;
        $failed = 0;

        foreach ($this->testResults as $test => $result) {
            if (is_bool($result)) {
                if ($result) {
                    echo "✅ $test\n";
                    $passed++;
                } else {
                    echo "❌ $test\n";
                    $failed++;
                }
            }
        }

        echo "\n───────────────────────────────────────────────\n";
        echo "Total: " . ($passed + $failed) . " | Passed: ✅ $passed | Failed: ❌ $failed\n";
        echo "───────────────────────────────────────────────\n\n";

        exit($failed > 0 ? 1 : 0);
    }
}

// Run tests
$tester = new PresetsTester(__DIR__ . '/config.json');
$tester->run();
