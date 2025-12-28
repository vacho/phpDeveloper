<?php
declare(strict_types=1);

namespace App\Provider;

use App\Model\User;
use App\Model\Notification;
use App\Enum\Channel;

class SlackProvider implements NotificationProviderInterface
{
    public function send(User $user, Notification $notification): void
    {
        echo "[Slack] Sending to {$user->name}'s workspace: {$notification->message}" . PHP_EOL;
    }

    public function supports(Channel $channel): bool
    {
        return $channel === Channel::SLACK;
    }
}
