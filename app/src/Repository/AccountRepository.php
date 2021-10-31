<?php

namespace App\Repository;

use App\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

class AccountRepository extends ServiceEntityRepository implements FilterUsersAccount
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Account::class);
    }

    final public function filterAccount(?string $data = null): array
    {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('App\Entity\Account', 'a');
        $rsm->addFieldResult('a', 'id', 'id');
        $rsm->addFieldResult('a', 'transaction', 'transaction');
        $rsm->addFieldResult('a', 'money', 'money');
        $rsm->addFieldResult('a', 'created_at', 'createdAt');

        $query = $this->getEntityManager()->createNativeQuery("SELECT id,transaction,money,created_at FROM account WHERE transaction = $data ", $rsm);

        return $query->getResult();
    }
}
