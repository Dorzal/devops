<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomeRepository")
 */
class Diplome
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_diplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_diplome;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee_diplome;

    public function getIdDiplome(): ?int
    {
        return $this->id_diplome;
    }

    public function getNomDiplome(): ?string
    {
        return $this->nom_diplome;
    }

    public function setNomDiplome(string $nom_diplome): self
    {
        $this->nom_diplome = $nom_diplome;

        return $this;
    }

    public function getAnneeDiplome(): ?int
    {
        return $this->annee_diplome;
    }

    public function setAnneeDiplome(int $annee_diplome): self
    {
        $this->annee_diplome = $annee_diplome;

        return $this;
    }

    //TODO objet : diplome
}
