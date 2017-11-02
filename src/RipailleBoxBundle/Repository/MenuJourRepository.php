<?php

namespace RipailleBoxBundle\Repository;

use Doctrine\ORM\Query;

/**
 * Class MenuJourRepository
 * @package RipailleBoxBundle\Repository
 */
class MenuJourRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Query
     */
    public function getAll()
    {
        $qb = $this->createQueryBuilder("menu");

        return $qb->getQuery();
    }

    /**
     * @param int $idMenu
     * @return Query
     */
    public function getOneById($idMenu)
    {
        $qb = $this->createQueryBuilder("menu");

        $qb
            ->where($qb->expr()->eq("menu.id", ":id"))
            ->setParameter("id", $idMenu)
        ;

        return $qb->getQuery();
    }
}
