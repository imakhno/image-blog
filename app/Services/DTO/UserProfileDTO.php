<?php

namespace App\Services\DTO;


/**
 * @property $name
 * @property $surname
 * @property $email
 * @property $image
 */
readonly class UserProfileDTO
{

    public function __construct(
        private string $name,
        private string $surname,
        private string $email,
        private string $image)
    {

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }
}
