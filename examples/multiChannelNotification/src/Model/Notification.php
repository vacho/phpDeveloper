<?php
declare(strict_types=1);

namespace App\Model;

use App\Enum\Priority;

readonly class Notification
{
    public function __construct(
        public string $message,
        public Priority $priority
    ) {}
}
