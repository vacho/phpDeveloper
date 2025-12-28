<?php
declare(strict_types=1);

namespace App\LogProcessor;

require_once('LogFormatterTrait.php');

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