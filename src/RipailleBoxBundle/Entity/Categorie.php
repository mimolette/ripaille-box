<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="couleurFond", type="string", length=10)
     */
    private $couleurFond;


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
}

