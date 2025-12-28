<?php
declare(strict_types=1);

namespace App\LogProcessor;

use Generator;


/**
 * Memory Efficient Reader: Uses a Generator to handle large files.
 */
class LogReader
{
    public function __construct(private string $filePath)
    {
        if (!file_exists($this->filePath)) {
            throw new LogProcessorException("File not found: {$this->filePath}");
        }
    }

    /**
     * The heart of the domain: Yielding lines one by one.
     */
    public function getLogs(): Generator
    {
        $handle = fopen($this->filePath, 'r');
        try {
            while (($line = fgets($handle)) !== false) {
                $line = trim($line);
                if (empty($line)) continue;

                try {
                    yield json_decode($line, true, 512, JSON_THROW_ON_ERROR);
                } catch (JsonException $e) {
                    // In a real scenario, we might log this error to a separate 'corrupt_logs' file
                    continue; 
                }
            }
        } finally {
            fclose($handle);
        }
    }
}

?>