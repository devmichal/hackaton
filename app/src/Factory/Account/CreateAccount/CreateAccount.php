<?php

namespace App\Factory\Account\CreateAccount;

use App\Entity\Account;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;

final class CreateAccount implements CreateAccountInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    )
    {
        $this->entityManager = $entityManager;
    }

    public function payIn(array $requestFromUsers, Users $users): void
    {

        $account = new Account(
            $requestFromUsers['money'],
            $users
        );

        $this->entityManager->persist($account);
        $this->entityManager->flush();
    }
}
