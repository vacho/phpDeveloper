<?php
declare(strict_types=1);

namespace App\Provider;

use App\Model\User;
use App\Model\Notification;
use App\Enum\Channel;

class EmailProvider implements NotificationProviderInterface
{
    public function send(User $user, Notification $notification): void
    {
        echo "[Email] Sending to {$user->email}: {$notification->message}" . PHP_EOL;
    }

    public function supports(Channel $channel): bool
    {
        return $channel === Channel::EMAIL;
    }
}
