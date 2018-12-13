<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_etat;

    public function getIdEtat(): ?int
    {
        return $this->id_etat;
    }

    public function getNomEtat(): ?string
    {
        return $this->nom_etat;
    }

    public function setNomEtat(string $nom_etat): self
    {
        $this->nom_etat = $nom_etat;

        return $this;
    }
}
