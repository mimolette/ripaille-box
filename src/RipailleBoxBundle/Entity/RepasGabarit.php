<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rb_repas_gabarit")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\RepasGabaritRepository")
 */
class RepasGabarit
{
    /**
     * @var int
     * @ORM\Column(name="id_gabarit", type="integer")
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
     * @var int
     * @ORM\Column(name="id_utilisateur", type="integer")
     */
    private $idUtilisateur;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="RipailleBoxBundle\Entity\Categorie")
     * @ORM\JoinTable(name="rb_categories_par_gabarit",
     *      joinColumns={@ORM\JoinColumn(name="gabarit_id", referencedColumnName="id_gabarit")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categorie_id", referencedColumnName="id_categorie")}
     *      )
     */
    private $categories;

    /**
     * RepasGabarit constructor.
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
}
