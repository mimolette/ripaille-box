<?php
namespace RipailleBoxBundle\Service\DAO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use RipailleBoxBundle\Entity\Ingredient;
use RipailleBoxBundle\Exception\RipailleBoxException;
use RipailleBoxBundle\Repository\IngredientRepository;

/**
 * Class IngredientDao
 * @package RipailleBoxBundle\Service\DAO
 */
class IngredientDao extends AbstractMasterDao
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

            // return Collection of Ingredient
            return new ArrayCollection($result);
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche des ingrédients.",
                $exception
            );
        }
    }

    /**
     * @param int $idIngredient
     * @return Ingredient
     */
    public function getOneById($idIngredient)
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get query
            $query = $repo->getOneById($idIngredient);

            // execute query and return Ingredient
            return $query->getSingleResult();
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche de l'ingrédient {$idIngredient}.",
                $exception
            );
        }
    }

    /**
     * @param Ingredient $ingredient
     * @param bool $flush
     */
    public function save(Ingredient $ingredient, $flush = true)
    {
        try {
            $this->entityManager->persist($ingredient);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la sauvegarde de l'ingrédient.",
                $exception
            );
        }
    }

    /**
     * @param Ingredient $ingredient
     * @param bool $flush
     */
    public function delete(Ingredient $ingredient, $flush = true)
    {
        try {
            $this->entityManager->remove($ingredient);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la suppression de l'ingrédient.",
                $exception
            );
        }
    }

    /**
     * @param string $repositoryClassName
     * @return IngredientRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Ingredient::class);
    }
}
