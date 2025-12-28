<?php
declare(strict_types=1);

namespace App\Notification;

use App\Provider\NotificationProviderInterface;
use App\Model\User;
use App\Model\Notification;
use App\Enum\Priority;
use App\Exception\ProviderFailureException;

class NotificationManager
{
    /** @var NotificationProviderInterface[] */
    private array $providers = [];

    public function addProvider(NotificationProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }

    public function notify(User $user, Notification $notification): void
    {
        if ($notification->priority === Priority::HIGH) {
            // High priority: Send to all available channels
            foreach ($this->providers as $provider) {
                try {
                    $provider->send($user, $notification);
                } catch (ProviderFailureException $e) {
                    echo "Error in provider: " . $e->getMessage() . PHP_EOL;
                }
            }
            return;
        }

        // Medium/Low priority: Send only to preferred channel
        foreach ($this->providers as $provider) {
            if ($provider->supports($user->preferredChannel)) {
                try {
                    $provider->send($user, $notification);
                } catch (ProviderFailureException $e) {
                     echo "Error in provider (preferred channel): " . $e->getMessage() . PHP_EOL;
                }
                return;
            }
        }
    }
}