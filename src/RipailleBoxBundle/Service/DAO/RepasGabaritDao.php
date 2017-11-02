<?php
namespace RipailleBoxBundle\Service\DAO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use RipailleBoxBundle\Entity\RepasGabarit;
use RipailleBoxBundle\Exception\RipailleBoxException;
use RipailleBoxBundle\Repository\RepasGabaritRepository;

/**
 * Class RepasGabaritDao
 * @package RipailleBoxBundle\Service\DAO
 */
class RepasGabaritDao extends AbstractMasterDao
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

            // return Collection of RepasGabarit
            return new ArrayCollection($result);
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche des gabarits.",
                $exception
            );
        }
    }

    /**
     * @param int $idRepasGabarit
     * @return RepasGabarit
     */
    public function getOneById($idRepasGabarit)
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get query
            $query = $repo->getOneById($idRepasGabarit);

            // execute query and return RepasGabarit
            return $query->getSingleResult();
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche du gabarit {$idRepasGabarit}.",
                $exception
            );
        }
    }

    /**
     * @param RepasGabarit $gabarit
     * @param bool $flush
     */
    public function save(RepasGabarit $gabarit, $flush = true)
    {
        try {
            $this->entityManager->persist($gabarit);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la sauvegarde du gabarit.",
                $exception
            );
        }
    }

    /**
     * @param RepasGabarit $gabarit
     * @param bool $flush
     */
    public function delete(RepasGabarit $gabarit, $flush = true)
    {
        try {
            $this->entityManager->remove($gabarit);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la suppression du gabarit.",
                $exception
            );
        }
    }

    /**
     * @param string $repositoryClassName
     * @return RepasGabaritRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(RepasGabarit::class);
    }
}
