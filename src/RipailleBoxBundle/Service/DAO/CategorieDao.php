<?php
namespace RipailleBoxBundle\Service\DAO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use RipailleBoxBundle\Entity\Categorie;
use RipailleBoxBundle\Exception\RipailleBoxException;
use RipailleBoxBundle\Repository\CategorieRepository;

/**
 * Class CategorieDao
 * @package RipailleBoxBundle\Service\DAO
 */
class CategorieDao extends AbstractMasterDao
{
    /**
     * @return Collection
     * @throws RipailleBoxException
     */
    public function getAll()
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get query
            $query = $repo->getAll();

            // execute query
            $result = $query->getResult();

            // return Collection of Categorie
            return new ArrayCollection($result);
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche des catégories.",
                $exception
            );
        }
    }

    /**
     * @param int $idCategorie
     * @return Categorie
     */
    public function getOneById($idCategorie)
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get query
            $query = $repo->getOneById($idCategorie);

            // execute query and return Categorie
            return $query->getSingleResult();
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche de la catégorie {$idCategorie}.",
                $exception
            );
        }
    }

    /**
     * @param Categorie $categorie
     * @param bool $flush
     */
    public function save(Categorie $categorie, $flush = true)
    {
        try {
            $this->entityManager->persist($categorie);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la sauvegarde de la catégorie.",
                $exception
            );
        }
    }

    /**
     * @param Categorie $categorie
     * @param bool $flush
     */
    public function delete(Categorie $categorie, $flush = true)
    {
        try {
            $this->entityManager->remove($categorie);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la suppression de la catégorie.",
                $exception
            );
        }
    }

    /**
     * @param string $repositoryClassName
     * @return CategorieRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Categorie::class);
    }
}
