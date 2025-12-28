<?php
declare(strict_types=1);

namespace App\LogProcessor;

require_once 'src/LogDispatcher/LogDispatcherInterface.php';

use App\LogDispatcher\LogDispatcherInterface;

/**
 * The Orchestrator: Demonstrates Dependency Injection and logic decoupling.
 */
final class LogProcessor
{
    /** @var LogDispatcherInterface[] */
    private array $dispatchers = [];

    public function addDispatcher(LogDispatcherInterface $dispatcher): void
    {
        $this->dispatchers[] = $dispatcher;
    }

    public function process(LogReader $reader, string $targetLevel = 'ERROR'): void
    {
        foreach ($reader->getLogs() as $log) {
            if (($log['level'] ?? '') === $targetLevel) {
                foreach ($this->dispatchers as $dispatcher) {
                    $dispatcher->dispatch($log);
                }
            }
        }
    }
}

?>