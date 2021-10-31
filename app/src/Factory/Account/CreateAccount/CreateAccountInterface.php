<?php

namespace App\Factory\Account\CreateAccount;

use App\Entity\Users;

interface CreateAccountInterface
{
    public function payIn(array $requestFromUsers, Users $users): void;
}