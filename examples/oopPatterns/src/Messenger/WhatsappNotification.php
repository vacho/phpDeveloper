<?php
declare(strict_types=1);

namespace App\Messenger;

class WhatsappNotification implements Notification {
    public function send(string $message, string $cellnumber): void {
        echo "Whatsapp to $cellnumber with content: ". $message . PHP_EOL;
    }
}

?>