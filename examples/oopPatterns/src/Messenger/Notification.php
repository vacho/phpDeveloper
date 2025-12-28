<?php
declare(strict_types=1);

namespace App\Messenger;

interface Notification {
    public function send(string $message, string $to): void;
}

?>