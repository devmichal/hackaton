<?php

namespace App\Command;

use App\Entity\Users;
use App\Enum\Roles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateAdminUsersCommand extends Command
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
            ->setName('create:admin')
            ->setDescription('This command create admin users')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = new Users();
        $users->setUsername('admin');
        $users->setEmail('bohema.michal@gmail.com');
        $users->setRoles(Roles::ADMIN);
        $users->setPassword(password_hash('qwerty123', PASSWORD_BCRYPT));

        $this->entityManager->persist($users);
        $this->entityManager->flush();

        return 1;
    }
}
