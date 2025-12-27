# Roadmap
This is the roadmap to turns from beginner to a master php developer

## Basic knowlege
- How works the internet: servers, clients.
- How websites works: protocols, files, html, css, javascript.
- Support technologies: git, code editors.
- Databases: mysql, postgresql

## PHP fundamentals
- Data types: variables, types.
- Control structures: Conditionals, loops.
- Functions.
- Files.
- OOP.
- Curl.
- Sessions.
- Cookies.
- Databases.
- Autoloading and composer.
- MVC Framework: routing, forms, migrations, login, encryption, middlewares, composer package.
- APIs.

## PHP world
- Third party packages: like OpenAI API.
- Frameworks: Laravel, Symfony, Code igniter.

## Front end skills
- JS Frameorks: Alphine, Angular, React, Vue.

## Devops
- Infraestructures: LAMP, docker, kubernetes.
- Terminal and linux commands.
- Web server configuration
- Project deployment.

## Productivity
- AI programing/support tools.

## Senior developer

### 1. Deep Dive: PHP Internals & Performance
- The Zend Engine: Understand how PHP code is compiled into Opcodes and the role of OPcache.
- Memory Management: Understanding reference counting, garbage collection, and how to debug memory leaks in long-running processes (like workers).
- PHP 8.x Features: Mastery of Attributes, Constructor Property Promotion, Match expressions, and the JIT (Just-In-Time) compiler.
- Swoole / RoadRunner: Understanding non-blocking I/O and how PHP can operate as a persistent application server rather than just a request-response script.

### 2. Architecture & Design Patterns

- SOLID Principles: Not just knowing the definitions, but knowing when a design is violating them.
- Design Patterns: Mastery of Factory, Strategy, Observer, Decorator, and Dependency Injection.
- Domain-Driven Design (DDD): Moving business logic out of "Fat Controllers" and into Domain Services and Entities.
- Hexagonal Architecture (Ports & Adapters): Decoupling your core logic from external dependencies like databases or APIs.

### 3. Testing & Quality Assurance

- Unit Testing (PHPUnit): Writing testable code by utilizing mocks and stubs.
- Static Analysis: Integrating tools like PHPStan or Psalm at level 8 or 9.
- TDD (Test Driven Development): Using tests to design the interface of your classes before writing logic.

### 4. Security & Scaling

- Advanced SQL: Optimizing slow queries, understanding indexing strategies, and handling race conditions (locking).
- Security: Beyond SQL injection—mastering CSRF, XSS, SSRF, and secure session handling.
- Message Brokers: Using Redis or RabbitMQ for asynchronous processing.
