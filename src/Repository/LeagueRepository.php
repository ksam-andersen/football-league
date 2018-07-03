<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\ParameterBag;

class LeagueRepository extends EntityRepository
{
    public function findByParams(ParameterBag $params)
    {
        $qb = $this->createQueryBuilder('l')
            ->setMaxResults($params->get('limit', 10))
            ->setFirstResult($params->get('offset', 0));

        return $qb->getQuery()->getResult();
    }
}
