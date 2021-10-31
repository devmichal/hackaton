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

    public function __construct(
        int $money,
        Users $users
    )
    {
        $this->id = uuid_create();
        $this->createdAt = new DateTime();
        $this->users = $users;
        $this->money = $money;
    }

    public function getTransaction(): string
    {
        return $this->transaction;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i');
    }

    public function getUsers(): Users
    {
        return $this->users;
    }
}
