<?php
declare(strict_types=1);

namespace App\Messenger;

class EmailNotification implements Notification {
    public function send(string $message, string $email): void {
         echo "Email to $email with content: ". $message . PHP_EOL;
   }
}

?>