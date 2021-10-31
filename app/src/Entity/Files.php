<?php

namespace App\Entity;

final class Files
{
    private $id;

    private \DateTime $createdAt;

    private string $path;

    private Users $users;

    public function __construct(
        string $files,
        Users $users
    ) {
        $this->id = uuid_create();
        $this->createdAt = new \DateTime();
        $this->path = $files;
        $this->users = $users;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return Users
     */
    public function getUsers(): Users
    {
        return $this->users;
    }

    /**
     * @param Users $users
     */
    public function setUsers(Users $users): void
    {
        $this->users = $users;
    }
}
