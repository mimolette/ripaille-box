<?php

namespace RipailleBoxBundle\Service\DAO;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractMasterDao
 * @package RipailleBoxBundle\Service\DAO
 */
abstract class AbstractMasterDao
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbstractMasterDao constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(
        EntityManager $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityRepository
     */
    abstract protected function getRepository();
}
