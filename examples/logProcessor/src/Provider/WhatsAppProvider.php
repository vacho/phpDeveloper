<?php
declare(strict_types=1);

namespace App\Provider;

use App\Model\User;
use App\Model\Notification;
use App\Enum\Channel;
use App\Exception\ProviderFailureException;

class WhatsAppProvider implements NotificationProviderInterface
{
    public function send(User $user, Notification $notification): void
    {
        if (!$user->phoneNumber) {
            throw new ProviderFailureException("Missing phone number for WhatsApp.");
        }
        echo "[WhatsApp] Sending to {$user->phoneNumber}: {$notification->message}" . PHP_EOL;
    }

    public function supports(Channel $channel): bool
    {
        return $channel === Channel::WHATSAPP;
    }
}
