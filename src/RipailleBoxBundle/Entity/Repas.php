<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rb_repas")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\RepasRepository")
 */
class Repas
{
    /**
     * @var int
     * @ORM\Column(name="id_repas", type="integer")
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
     * @var Collection
     * @ORM\ManyToMany(targetEntity="RipailleBoxBundle\Entity\Ingredient")
     * @ORM\JoinTable(name="rb_ingredient_par_repas",
     *      joinColumns={@ORM\JoinColumn(name="repas_id", referencedColumnName="id_repas")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ingredient_id", referencedColumnName="id_ingredient")}
     *      )
     */
    private $ingredients;

    /**
     * Repas constructor.
     */
    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $type
     * @return Repas
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

    /**
     * @param Ingredient $ingredient
     * @return Repas
     */
    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * @param Ingredient $ingredient
     */
    public function removeIngredient(Ingredient $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * @return Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}
