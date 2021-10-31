<?php

namespace App\Security;

use App\Exception\RolesAccessException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CheckUsersRole implements UserCheckerInterface
{

    private const ROLES_ADMIN = 'ROLES_ADMIN';

    final public function checkPreAuth(UserInterface $user): void
    {

    }

    final public function checkPostAuth(UserInterface $user): void
    {
        if (!in_array(self::ROLES_ADMIN, $user->getRoles())) {

            throw new RolesAccessException('Access deny for this user');
        }
    }
}