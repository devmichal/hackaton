<?php

namespace App\Command;

use App\Entity\Users;
use App\Enum\Roles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateUsersCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        string $name = null,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($name);
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->setName('crate:users')
               ->setDescription('Create normal user into app')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = new Users();
        $users->setUsername('torin');
        $users->setEmail('torin.michal@gmail.com');
        $users->setRoles(Roles::USERS);
        $users->setPassword(password_hash('user123', PASSWORD_BCRYPT));

        $this->entityManager->persist($users);
        $this->entityManager->flush();

        return 1;
    }
}
