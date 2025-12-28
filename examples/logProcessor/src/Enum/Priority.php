<?php
declare(strict_types=1);

namespace App\Enum;

enum Priority: string
{
    case HIGH = 'High';
    case MEDIUM = 'Medium';
    case LOW = 'Low';
}