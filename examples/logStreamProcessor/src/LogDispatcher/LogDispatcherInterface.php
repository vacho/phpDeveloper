<?php
declare(strict_types=1);

namespace App\LogDispatcher;

/**
 * Interface Segregation: Defines the contract for any output driver.
 */
interface LogDispatcherInterface
{
    public function dispatch(array $logData): void;
}

?>