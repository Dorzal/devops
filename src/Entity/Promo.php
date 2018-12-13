<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PromoRepository")
 */
class Promo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_promo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_promo;

    public function getIdPromo(): ?int
    {
        return $this->id_promo;
    }

    public function getNomPromo(): ?string
    {
        return $this->nom_promo;
    }

    public function setNomPromo(string $nom_promo): self
    {
        $this->nom_promo = $nom_promo;

        return $this;
    }
}
