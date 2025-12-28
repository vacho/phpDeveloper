<?php
declare(strict_types=1);

namespace App\Provider;

use App\Model\User;
use App\Model\Notification;
use App\Enum\Channel;
use App\Exception\ProviderFailureException;

class SmsProvider implements NotificationProviderInterface
{
    public function send(User $user, Notification $notification): void
    {
        if (!$user->phoneNumber) {
            throw new ProviderFailureException("Missing phone number for SMS.");
        }
        echo "[SMS] Sending to {$user->phoneNumber}: {$notification->message}" . PHP_EOL;
    }

    public function supports(Channel $channel): bool
    {
        return $channel === Channel::SMS;
    }
}
