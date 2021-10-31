<?php

namespace App\Entity;

use DateTime;

class Account
{
    private string $id;

    private string $transaction;

    private int $money;

    private DateTime $createdAt;

    private Users $users;

    public function __construct()
    {
        $this->id        = uuid_create();
        $this->createdAt = new DateTime();
    }

    /**
     * @return string
     */
    public function getTransaction(): string
    {
        return $this->transaction;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return Users
     */
    public function getUsers(): Users
    {
        return $this->users;
    }
}
