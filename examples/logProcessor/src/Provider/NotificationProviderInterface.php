<?php
declare(strict_types=1);

namespace App\Provider;

use App\Model\User;
use App\Model\Notification;
use App\Enum\Channel;

interface NotificationProviderInterface
{
    public function send(User $user, Notification $notification): void;
    public function supports(Channel $channel): bool;
}
