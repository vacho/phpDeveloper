<?php
declare(strict_types=1);

namespace App\LogDispatcher;

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

?>