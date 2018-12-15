<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_matiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_matiere;

    /**
     * Many Groupes have Many Utilisateurs.
     * @ORM\ManyToMany(targetEntity="Promo", mappedBy="matieres")
     */
    private $promos;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Cours", mappedBy="matieres")
     */
    private $coursparmatiere;

    public function getIdMatiere(): ?int
    {
        return $this->id_matiere;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nom_matiere;
    }

    public function setNomMatiere(string $nom_matiere): self
    {
        $this->nom_matiere = $nom_matiere;

        return $this;
    }

    public function getPromos(){
        return $this->promos;
    }

    public function __construct(){
        $this->promos = new ArrayCollection();
        $this->coursparmatiere = new ArrayCollection();
    }

    //TODO objet diplome
}
