<?php

namespace App\Entity;

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

    //Todo objet promo et utilisateur
}
