<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtudeRepository")
 */
class Etude
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_etude;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee_etude;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Promo", mappedBy="Etude")
     */
    private $promos;

    public function getIdEtude(): ?int
    {
        return $this->id_etude;
    }

    public function getAnneeEtude(): ?int
    {
        return $this->annee_etude;
    }

    public function setAnneeEtude(int $annee_etude): self
    {
        $this->annee_etude = $annee_etude;

        return $this;
    }

    public function getPromos(){
        return $this->promos;
    }

    public function __construct()
    {
        $this->promos = new ArrayCollection();
    }


    //Todo objet promo et utilisateur
}
