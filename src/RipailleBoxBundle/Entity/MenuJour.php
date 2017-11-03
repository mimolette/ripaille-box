<?php

namespace RipailleBoxBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rb_menu_jour")
 * @ORM\Entity(repositoryClass="RipailleBoxBundle\Repository\MenuJourRepository")
 */
class MenuJour
{
    /**
     * @var int
     * @ORM\Column(name="id_menu_jour", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     * @ORM\Column(name="id_utilisateur", type="integer")
     */
    private $idUtilisateur;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="RipailleBoxBundle\Entity\Repas")
     * @ORM\JoinTable(name="rb_repas_par_menu",
     *      joinColumns={@ORM\JoinColumn(name="menu_jour_id", referencedColumnName="id_menu_jour")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="repas_id", referencedColumnName="id_repas")}
     *      )
     */
    private $listeRepas;

    /**
     * MenuJour constructor.
     */
    public function __construct()
    {
        $this->listeRepas = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $date
     * @return MenuJour
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param Repas $repas
     * @return MenuJour
     */
    public function addRepas(Repas $repas)
    {
        $this->listeRepas[] = $repas;

        return $this;
    }

    /**
     * @param Repas $repas
     */
    public function removeRepas(Repas $repas)
    {
        $this->listeRepas->removeElement($repas);
    }

    /**
     * @return Collection
     */
    public function getListeRepas()
    {
        return $this->listeRepas;
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
