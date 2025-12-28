<?php
declare(strict_types=1);

namespace App\LogDispatcher;

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