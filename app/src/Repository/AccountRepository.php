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
        dump($data);
        $rsm = new ResultSetMapping();

        $query = $this->getEntityManager()->createNativeQuery("SELECT transaction, money FROM account WHERE transaction = 12", $rsm);

        // dump($query->getSQL());
        //  dump($query->);

        return $query->getResult();

        /*$qb = $this->createQueryBuilder('a');
        $qb
            ->where('a.transaction LIKE :transaction')
            ->setParameter('transaction', '1 or 1=1');
          //  ->setParameter('transaction', "$data");

        dump($qb->getQuery());

        $result = $qb->getQuery()->getResult();
        $table = [];

        foreach ($result as $item) {

            $table[] = [
                $item->getTransaction(),
                $item->getCreatedAt()->format('Y-m-d'),
                $item->getmoney()
            ];
        }

        return $table;*/
    }
}
