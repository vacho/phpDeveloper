<?php
declare(strict_types=1);

namespace App\LogDispatcher;

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

?>