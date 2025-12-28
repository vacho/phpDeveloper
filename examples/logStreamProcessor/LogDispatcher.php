<?php
declare(strict_types=1);

namespace App\LogProcessor;

/**
 * Trait: Demonstrates code reuse for formatting logic across different drivers.
 */
trait LogFormatterTrait
{
    private function formatLog(array $data): string
    {
        $timestamp = date('Y-m-d H:i:s', $data['timestamp'] ?? time());
        $level = strtoupper($data['level'] ?? 'INFO');
        $message = $data['message'] ?? 'No message provided';
        
        return sprintf("[%s] %s: %s" . PHP_EOL, $timestamp, $level, $message);
    }
}

/**
 * Interface Segregation: Defines the contract for any output driver.
 */
interface LogDispatcherInterface
{
    public function dispatch(array $logData): void;
}

/**
 * Concrete Dispatcher 1: CLI Output
 */
class ConsoleDispatcher implements LogDispatcherInterface
{
    use LogFormatterTrait;

    public function dispatch(array $logData): void
    {
        echo "Console: " . $this->formatLog($logData);
    }
}

/**
 * Concrete Dispatcher 2: Mock Database/File Output
 */
class FileDispatcher implements LogDispatcherInterface
{
    use LogFormatterTrait;

    public function dispatch(array $logData): void
    {
        // Mocking file append
        $entry = "FILE_STORE: " . $this->formatLog($logData);
        file_put_contents('app.log', $entry, FILE_APPEND);
        echo $entry; 
    }
}

?>