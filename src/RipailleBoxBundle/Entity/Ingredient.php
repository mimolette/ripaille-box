<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rb_ingredient")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @var int
     * @ORM\Column(name="id_ingredient", type="integer")
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
     * @var int
     * @ORM\Column(name="id_utilisateur", type="integer")
     */
    private $idUtilisateur;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="RipailleBoxBundle\Entity\Categorie", inversedBy="ingredients")
     * @ORM\JoinTable(name="rb_categorie_par_ingredient",
     *      joinColumns={@ORM\JoinColumn(name="ingredient_id", referencedColumnName="id_ingredient")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categorie_id", referencedColumnName="id_categorie")}
     *      )
     */
    private $categories;

    /**
     * Categorie constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
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
     * @return int
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param int $idUtilisateur
     * @return Categorie
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    /**
     * @param Categorie $categorie
     * @return Ingredient
     */
    public function addCategorie(Categorie $categorie)
    {
        $this->categories[] = $categorie;

        return $this;
    }

    /**
     * @param Categorie $categorie
     */
    public function removeCategorie(Categorie $categorie)
    {
        $this->categories->removeElement($categorie);
    }

    /**
     * @return Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
