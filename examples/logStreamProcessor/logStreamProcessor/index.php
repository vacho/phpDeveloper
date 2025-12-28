<?php
declare(strict_types=1);

namespace App\LogProcessor;
require_once('LogReader.php');
require_once('CriticalLogProcessor.php');
require_once('LogDispatcher.php');


/**
 * CHALLENGE 1: Implement the Generator
 * Create a class 'LogReader' that accepts a file path and yields 
 * decoded JSON objects one by one.
 * DONE! : LogReader.php
 */

/**
 * CHALLENGE 2: Design the Contract
 * Create an interface for Dispatchers and a Trait for Log Formatting.
 * DONE! : LogDispacher.php
 */

/**
 * CHALLENGE 3: Implementation
 * Create a 'CriticalLogProcessor' that coordinates the reader and the dispatchers.
 * DONE!: CriticalLogProcessor
 */

// --- TEST DATA GENERATOR (Helper for the dev) ---
// Use this to simulate a log line for your test
// {"level": "ERROR", "message": "Database connection timed out", "timestamp": 1622548800}


/**
 * --- EXECUTION EXAMPLE ---
 */
// 1. Create a dummy log file for demonstration
//$tempFile = tempnam(sys_get_temp_dir(), 'logs');
$tempFile = tempnam(__DIR__, 'logs');
$mockData = [
    json_encode(['level' => 'INFO', 'message' => 'System started', 'timestamp' => time()]),
    json_encode(['level' => 'ERROR', 'message' => 'Zapatito Database connection failed', 'timestamp' => time()]),
    json_encode(['level' => 'DEBUG', 'message' => 'Osvi Trace route 123', 'timestamp' => time()]),
    json_encode(['level' => 'ERROR', 'message' => 'Disk space low', 'timestamp' => time()]),
];
file_put_contents($tempFile, implode(PHP_EOL, $mockData));
echo "Done generating log files... into $tempFile";

try {
    // 2. Initialize components
    $reader = new LogReader($tempFile);
    $processor = new CriticalLogProcessor();

    // 3. Inject drivers
    $processor->addDispatcher(new ConsoleDispatcher());
    $processor->addDispatcher(new FileDispatcher());

    // 4. Run process
    echo "--- Starting Log Processing ---" . PHP_EOL;
    $processor->process($reader, 'ERROR');
    echo "--- Processing Complete ---" . PHP_EOL;

} catch (Exception $e) {
    echo "Fatal Error: " . $e->getMessage();
} finally {
    unlink($tempFile); // Cleanup
}

?>
