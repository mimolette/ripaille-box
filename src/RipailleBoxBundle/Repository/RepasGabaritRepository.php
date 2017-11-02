<?php

namespace RipailleBoxBundle\Repository;

use Doctrine\ORM\Query;

/**
 * Class RepasGabaritRepository
 * @package RipailleBoxBundle\Repository
 */
class RepasGabaritRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Query
     */
    public function getAll()
    {
        $qb = $this->createQueryBuilder("gab");

        return $qb->getQuery();
    }

    /**
     * @param int $idGabarit
     * @return Query
     */
    public function getOneById($idGabarit)
    {
        $qb = $this->createQueryBuilder("gab");

        $qb
            ->where($qb->expr()->eq("gab.id", ":id"))
            ->setParameter("id", $idGabarit)
        ;

        return $qb->getQuery();
    }
}
