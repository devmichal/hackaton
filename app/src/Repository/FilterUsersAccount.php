<?php

namespace App\Repository;

interface FilterUsersAccount
{
    public function filterAccount(?string $data = null): array;
}
