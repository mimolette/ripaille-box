<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="repas_gabarit")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\RepasGabaritRepository")
 */
class RepasGabarit
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="type", type="integer")
     */
    private $type;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $type
     * @return RepasGabarit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}

