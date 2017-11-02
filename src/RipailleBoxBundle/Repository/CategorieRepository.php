<?php
namespace RipailleBoxBundle\Repository;

use Doctrine\ORM\Query;

/**
 * Class CategorieRepository
 * @package RipailleBoxBundle\Repository
 */
class CategorieRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Query
     */
    public function getAll()
    {
        $qb = $this->createQueryBuilder("cat");

        return $qb->getQuery();
    }

    /**
     * @param int $idCategorie
     * @return Query
     */
    public function getOneById($idCategorie)
    {
        $qb = $this->createQueryBuilder("cat");

        $qb
            ->where($qb->expr()->eq("cat.id", ":id"))
            ->setParameter("id", $idCategorie)
        ;

        return $qb->getQuery();
    }
}
