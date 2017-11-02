<?php

namespace RipailleBoxBundle\Repository;

use Doctrine\ORM\Query;

/**
 * Class IngredientRepository
 * @package RipailleBoxBundle\Repository
 */
class IngredientRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Query
     */
    public function getAll()
    {
        $qb = $this->createQueryBuilder("ing");

        return $qb->getQuery();
    }

    /**
     * @param int $idIngredient
     * @return Query
     */
    public function getOneById($idIngredient)
    {
        $qb = $this->createQueryBuilder("ing");

        $qb
            ->where($qb->expr()->eq("ing.id", ":id"))
            ->setParameter("id", $idIngredient)
        ;

        return $qb->getQuery();
    }
}
