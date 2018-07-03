<?php

namespace App\Services;

use App\Entity\League;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class LeagueService.
 * manages the League entity.
 */
class LeagueService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function delete(League $league)
    {
        $this->em->remove($league);
        $this->em->flush();
    }
}
