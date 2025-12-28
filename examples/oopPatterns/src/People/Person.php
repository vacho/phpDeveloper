<?php
declare(strict_types = 1);

namespace App\People;

class Person {
    public function __construct(
        private string $id,
        private string $firstname,
        private string $lastname,
        private string $gender,
        private string $email,
        private string $cellphone
    ) {}

    public function getId(): string {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getCellphone(): string {
        return $this->cellphone;
    }

    public function show(): void {
        echo "$this->id | $this->firstname $this->lastname $this->gender $this->email $this->cellphone";
    }
}

?>