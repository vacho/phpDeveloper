<?php
declare(strict_types=1);

namespace App\Model;

use App\Enum\Channel;

readonly class User
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $phoneNumber,
        public Channel $preferredChannel
    ) {}
}
