<?php
declare(strict_types=1);

namespace App\Enum;

enum Channel: string
{
    case EMAIL = 'Email';
    case SMS = 'SMS';
    case SLACK = 'Slack';
    case WHATSAPP = 'WhatsApp';
}
