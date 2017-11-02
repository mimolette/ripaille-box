<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rb_categorie")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     * @ORM\Column(name="id_categorie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=50, unique=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="couleur", type="string", length=10)
     */
    private $couleur;

    /**
     * @var string
     * @ORM\Column(name="couleur_fond", type="string", length=10)
     */
    private $couleurFond;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="RipailleBoxBundle\Entity\Ingredient", mappedBy="categories")
     */
    private $ingredients;

    /**
     * Categorie constructor.
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
     * @param string $nom
     * @return Categorie
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
     * @param string $couleur
     * @return Categorie
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param string $couleurFond
     * @return Categorie
     */
    public function setCouleurFond($couleurFond)
    {
        $this->couleurFond = $couleurFond;

        return $this;
    }

    /**
     * @return string
     */
    public function getCouleurFond()
    {
        return $this->couleurFond;
    }

    /**
     * @param Ingredient $ingredient
     * @return Categorie
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
