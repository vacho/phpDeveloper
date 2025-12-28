# Senior PHP Practical Assessment: The "LogStream" ProcessorTime 
Limit: 30 - 45 Minutes

Objective: Build a memory-efficient, extensible log processing utility that demonstrates mastery of Generators, Interfaces, Traits, and Strict Typing.

## The Scenario
Your company has a 2GB log file containing JSON-encoded logs. You need to create a system that:
1. Reads the file without loading it into memory.
2. Filters logs based on severity (e.g., "ERROR", "CRITICAL").
3. Transforms the logs into a standardized format.
4. Dispatches them to multiple outputs (e.g., a Database Mock and a CLI Buffer).

## Technical Requirements
1. PSR-4 & Autoloading: Assume a namespace of App\LogProcessor.
2. Memory Management: You MUST use a PHP Generator (yield) to read the file.
3. Strict Typing: Every file must start with declare(strict_types=1);.
4. Interface Segregation: Define a LogDispatcherInterface that various output drivers must implement.
5. Traits: Use a Trait to provide a Formatting utility to the drivers.
6. Error Handling: Use a custom Exception class for invalid JSON structures.

## Provided Skeleton
```php
<?php
declare(strict_types=1);

namespace App\LogProcessor;

/**
 * CHALLENGE 1: Implement the Generator
 * Create a class 'LogReader' that accepts a file path and yields 
 * decoded JSON objects one by one.
 */

/**
 * CHALLENGE 2: Design the Contract
 * Create an interface for Dispatchers and a Trait for Log Formatting.
 */

/**
 * CHALLENGE 3: Implementation
 * Create a 'CriticalLogProcessor' that coordinates the reader and the dispatchers.
 */

// --- TEST DATA GENERATOR (Helper for the dev) ---
// Use this to simulate a log line for your test
// {"level": "ERROR", "message": "Database connection timed out", "timestamp": 1622548800}
```

## Success Criteria (Senior Level)
An experienced developer will be judged on:
- Memory Footprint: Does the script use fgets() and yield? (Loading the whole file via file_get_contents is an automatic fail).
- Dependency Injection: Are the Dispatchers injected into the Processor via the constructor?
- Type Safety: Are return types and parameter types strictly defined?
- Extensibility: How easy is it to add a "SlackNotificationDispatcher" without changing the core Processor logic?
- Efficiency: Using json_decode error handling (JSON_THROW_ON_ERROR) or checking for null.

## Instructions for the Candidate
1. Setup a basic directory structure (src/, tests/ or just a single index.php for speed).
2. Implement the LogReader using a Generator.
3. Implement at least two Dispatchers (e.g., ConsoleDispatcher and FileDispatcher).
4. Write a small execution script that processes a mock array of strings representing log lines to prove it works.
