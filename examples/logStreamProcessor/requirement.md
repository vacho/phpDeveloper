# PHP Senior Developer Practical Challenge
## Overview
This challenge evaluates your ability to design scalable, maintainable, and testable PHP applications. We are looking for clean code, appropriate use of design patterns, and a solid understanding of modern PHP (8.2+).

## The Scenario: "The Multi-Channel Notification Engine"
Your task is to build a core module for a notification system that can send messages across different channels (Email, SMS, and Slack).

## Core Requirements
1. Extensibility: Adding a new notification channel (e.g., WhatsApp) should require zero changes to the existing core logic (Open/Closed Principle).
2. Logic:
A User has a preferred notification method.
A Notification contains a message and a priority (High, Medium, Low).
High-priority notifications should be sent to all available channels, regardless of user preference.
3. Third-Party Simulation: You don't need to connect to real APIs. Mock the actual "sending" part (e.g., echo "Email sent to $email";).

## Technical Constraints
- PHP Version: 8.2 or 8.3.
- Typing: Use strict typing (declare(strict_types=1);) and proper type hinting.
- Patterns: Implement the Strategy Pattern for the different channels and the Dependency Injection pattern to manage them.
- Error Handling: Implement custom exceptions for "Provider Failures."

## Tasks
1. Architecture Design
Define an Interface NotificationProviderInterface that all channels must implement.
2. Implementation
Create classes for EmailProvider, SmsProvider, and SlackProvider.
Create a NotificationManager class that orchestrates the sending logic based on the priority rules mentioned above.
3. Testing (Conceptual or Actual)
Describe or implement how you would unit test the NotificationManager without actually sending emails.

## Evaluation Criteria
| Criteria | What we are looking for
| -------- | ------------------------
| SOLID Principles | Specifically the Single Responsibility and Dependency Inversion principles. |
| Design Patterns | Correct implementation of the Strategy pattern. |
| Modern PHP | Use of constructor promotion, enums (for Priority), and readonly properties. |
| Edge Cases | How you handle a provider being down or a user missing a phone number. |

## Submission Instructions
- Provide the source code in a clean directory structure.
- Include a README.md explaining your architectural choices.
- (Optional) Include a composer.json if you choose to use PHPUnit for tests.
