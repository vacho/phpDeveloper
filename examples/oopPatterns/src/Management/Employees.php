<?php
declare(strict_types=1);

namespace App\Management;

require_once 'src/People/Person.php';
require_once 'src/People/Position.php';
require_once 'src/Messenger/NotificationFactory.php';
require_once 'src/Messenger/Notification.php';
require_once 'src/Messenger/EmailNotification.php';
require_once 'src/Messenger/WhatsappNotification.php';

use App\People\Person;
use App\People\Position;
use App\Messenger\NotificationFactory;
use App\Messenger\Notification;
use App\Messenger\EmailNotification;
use App\Messenger\WhatsappNotification;

final class Employees {
    private \SplObjectStorage $employees;

    public function __construct() {
        $this->employees = new \SplObjectStorage();
    }

    public function add(Person $person, Position $position): void {
        $this->employees[$person] = $position;
        // Send message.
    }

    public function changePosition(Person $person, Position $position): void {
        // Find the employee
        if ($this->employees->contains($person)) {
            //$oldPosition = $this->employees[$person]
            $oldPosition = $this->employees[$person]->getName();
            $this->employees[$person] = $position;
        
            // Send messages.
            $notifications = ['email', 'whatsapp'];
            foreach ($notifications as $notificationType) {
                try {
                    $notification = NotificationFactory::create($notificationType);
                    $newPosition = $position->getName();
                    $to = '';
                    if ($notificationType == 'email') {
                        $to = $person->getEmail();
                    }
                    elseif ($notificationType == 'whatsapp') {
                        $to = $person->getCellphone();
                    }
                    //echo $notificationType . PHP_EOL . $to . PHP_EOL;
                    $notification->send("You change the position from '$oldPosition' to '$newPosition'!", $to);
                } catch (InvalidArgumentException $e) {
                    echo $e->getMessage();
                }
            }
        }        
    }

    public function show(): void {
        echo "--- EMPLOYEES LIST ---" . PHP_EOL;
        foreach($this->employees as $person) {
            $position = $this->employees[$person];
            $person->show();
            echo " ";
            $position->show();
            echo PHP_EOL;
        }
    }
}

?>