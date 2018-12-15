<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 */
class Groupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_groupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_groupe;


    /**
     * Many Groupes have Many Utilisateurs.
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="groupes")
     */
    private $utilisateurs;


    public function getIdGroupe(): ?int
    {
        return $this->id_groupe;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nom_groupe;
    }

    public function setNomGroupe(string $nom_groupe): self
    {
        $this->nom_groupe = $nom_groupe;

        return $this;
    }

    public function getUtilisateurs(){
        return $this->utilisateurs;
    }


    public function __construct() {
        $this->utilisateurs = new ArrayCollection();
    }

}
