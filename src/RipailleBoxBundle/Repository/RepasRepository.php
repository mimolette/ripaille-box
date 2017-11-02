<?php

namespace RipailleBoxBundle\Repository;

use Doctrine\ORM\Query;

/**
 * Class RepasRepository
 * @package RipailleBoxBundle\Repository
 */
class RepasRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Query
     */
    public function getAll()
    {
        $qb = $this->createQueryBuilder("repas");

        return $qb->getQuery();
    }

    /**
     * @param int $idRepas
     * @return Query
     */
    public function getOneById($idRepas)
    {
        $qb = $this->createQueryBuilder("repas");

        $qb
            ->where($qb->expr()->eq("repas.id", ":id"))
            ->setParameter("id", $idRepas)
        ;

        return $qb->getQuery();
    }
}
