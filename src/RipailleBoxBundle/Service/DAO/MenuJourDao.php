<?php
namespace RipailleBoxBundle\Service\DAO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use RipailleBoxBundle\Entity\MenuJour;
use RipailleBoxBundle\Exception\RipailleBoxException;
use RipailleBoxBundle\Repository\MenuJourRepository;

/**
 * Class MenuJourDao
 * @package RipailleBoxBundle\Service\DAO
 */
class MenuJourDao extends AbstractMasterDao
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

            // return Collection of MenuJour
            return new ArrayCollection($result);
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche des jours de menus.",
                $exception
            );
        }
    }

    /**
     * @param int $idMenuJour
     * @return MenuJour
     */
    public function getOneById($idMenuJour)
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get query
            $query = $repo->getOneById($idMenuJour);

            // execute query and return MenuJour
            return $query->getSingleResult();
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche du jour de menu {$idMenuJour}.",
                $exception
            );
        }
    }

    /**
     * @param MenuJour $menuJour
     * @param bool $flush
     */
    public function save(MenuJour $menuJour, $flush = true)
    {
        try {
            $this->entityManager->persist($menuJour);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la sauvegarde du jour de menu.",
                $exception
            );
        }
    }

    /**
     * @param MenuJour $menuJour
     * @param bool $flush
     */
    public function delete(MenuJour $menuJour, $flush = true)
    {
        try {
            $this->entityManager->remove($menuJour);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la suppression du jour de menu.",
                $exception
            );
        }
    }

    /**
     * @param string $repositoryClassName
     * @return MenuJourRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(MenuJour::class);
    }
}
