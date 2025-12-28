<?php
declare(strict_types=1);

require_once('LogReader.php');
require_once('CriticalLogProcessor.php');
require_once('LogDispatcher.php');

use App\LogProcessor\LogReader;
use App\LogProcessor\CriticalLogProcessor;
use App\LogProcessor\ConsoleDispatcher;
use App\LogProcessor\FileDispatcher;

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
echo "$tempFile generated..." . PHP_EOL . PHP_EOL;

try {
    // 2. Initialize components
    $reader = new LogReader($tempFile);
    $processor = new CriticalLogProcessor();

    // 3. Inject drivers
    $processor->addDispatcher(new ConsoleDispatcher());
    $processor->addDispatcher(new FileDispatcher());

    // 4. Run process
    echo "--- Starting Log Processing ---" . PHP_EOL . PHP_EOL;
    $processor->process($reader, 'ERROR');
    echo "--- Processing Complete ---" . PHP_EOL . PHP_EOL;

} catch (Exception $e) {
    echo "Fatal Error: " . $e->getMessage() . PHP_EOL;
} finally {
    unlink($tempFile); // Cleanup
}

?>
