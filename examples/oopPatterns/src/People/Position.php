<?php
declare(strict_types=1);

namespace App\People;

class Position {
    public function __construct(
        public string $name,
        public string $salary,
    ){}

    public function getName(): string {
        return $this->name;
    }

    public function show(): void {
        echo "$this->name $this->salary";
    }
}

?>