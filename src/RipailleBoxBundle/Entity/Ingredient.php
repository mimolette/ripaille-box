<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=100, unique=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="nomComparaison", type="string", length=100, unique=true)
     */
    private $nomComparaison;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $nom
     * @return Ingredient
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nomComparaison
     * @return Ingredient
     */
    public function setNomComparaison($nomComparaison)
    {
        $this->nomComparaison = $nomComparaison;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomComparaison()
    {
        return $this->nomComparaison;
    }
}

