<?php
declare(strict_types=1);

namespace App\LogProcessor;

require_once('LogDispatcher.php');
require_once('LogReader.php');

use App\LogProcessor\LogDispatcherInterface;

/**
 * The Orchestrator: Demonstrates Dependency Injection and logic decoupling.
 */
final class CriticalLogProcessor
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