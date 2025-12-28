<?php
declare(strict_types=1);

namespace App\Notification;

// Manual Autoloading (simulating composer)
require_once 'src/Enum/Priority.php';
require_once 'src/Enum/Channel.php';
require_once 'src/Exception/ProviderFailureException.php';
require_once 'src/Model/User.php';
require_once 'src/Model/Notification.php';
require_once 'src/Provider/NotificationProviderInterface.php';
require_once 'src/Provider/EmailProvider.php';
require_once 'src/Provider/SmsProvider.php';
require_once 'src/Provider/SlackProvider.php';
require_once 'src/Provider/WhatsAppProvider.php';
require_once 'src/NotificationManager.php';

use App\Enum\Priority;
use App\Enum\Channel;
use App\Model\User;
use App\Model\Notification;
use App\Provider\EmailProvider;
use App\Provider\SmsProvider;
use App\Provider\SlackProvider;
use App\Provider\WhatsAppProvider;

// 1. Setup the Manager
$manager = new NotificationManager();
$manager->addProvider(new EmailProvider());
$manager->addProvider(new SmsProvider());
$manager->addProvider(new SlackProvider());
$manager->addProvider(new WhatsAppProvider());

// 2. Create Users
$osvi = new User("Osvi", "osvi@example.com", "123-456", Channel::WHATSAPP);
$vacho = new User("Vacho", "vacho@example.com", null, Channel::EMAIL);

// 3. Test Notifications
echo "--- Scenario 1: Low Priority (Preferred Channel) ---" . PHP_EOL;
$lowMsg = new Notification("Your coffee is ready!", Priority::LOW);
$manager->notify($osvi, $lowMsg); 

echo PHP_EOL . "--- Scenario 2: High Priority (All Channels) ---" . PHP_EOL;
$highMsg = new Notification("SERVER IS DOWN!", Priority::HIGH);
$manager->notify($vacho, $highMsg); 
// Note: Vacho has no phone number, so SMS/WhatsApp will show error but Email/Slack will work.