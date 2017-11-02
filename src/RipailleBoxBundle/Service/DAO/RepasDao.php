<?php
namespace RipailleBoxBundle\Service\DAO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use RipailleBoxBundle\Entity\Repas;
use RipailleBoxBundle\Exception\RipailleBoxException;
use RipailleBoxBundle\Repository\RepasRepository;

/**
 * Class RepasDao
 * @package RipailleBoxBundle\Service\DAO
 */
class RepasDao extends AbstractMasterDao
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

            // return Collection of Repas
            return new ArrayCollection($result);
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche des repas.",
                $exception
            );
        }
    }

    /**
     * @param int $idRepas
     * @return Repas
     */
    public function getOneById($idRepas)
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get query
            $query = $repo->getOneById($idRepas);

            // execute query and return Repas
            return $query->getSingleResult();
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la recherche du repas {$idRepas}.",
                $exception
            );
        }
    }

    /**
     * @param Repas $repas
     * @param bool $flush
     */
    public function save(Repas $repas, $flush = true)
    {
        try {
            $this->entityManager->persist($repas);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la sauvegarde du repas.",
                $exception
            );
        }
    }

    /**
     * @param Repas $repas
     * @param bool $flush
     */
    public function delete(Repas $repas, $flush = true)
    {
        try {
            $this->entityManager->remove($repas);

            if ($flush) {
                $this->entityManager->flush();
            }
        } catch (\Exception $exception) {
            throw new RipailleBoxException(
                "Une erreur est survenue lors de la suppression du repas.",
                $exception
            );
        }
    }

    /**
     * @param string $repositoryClassName
     * @return RepasRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository(Repas::class);
    }
}
