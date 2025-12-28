<?php
declare(strict_types=1);

namespace App\Messenger;

class NotificationFactory{
    public static function create(string $type): Notification {
        switch ($type){
            case 'email':
                return new EmailNotification();
            case 'whatsapp':
                return new WhatsappNotification();
            default:
                return NULL;
        }
    }

}

?>