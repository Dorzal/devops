<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_cours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_cours;

    /**
     * @ORM\Column(type="blob")
     */
    private $contenu_cours;


    /**
     * @ORM\Column(type="datetime")
     */
    private $date_cours;

    /**
     * @ORM\Column(type="boolean")
     */
    private $certifie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $like_cours;

    public function getIdCours(): ?int
    {
        return $this->id_cours;
    }

    public function getNomCours(): ?string
    {
        return $this->nom_cours;
    }

    public function setNomCours(string $nom_cours): self
    {
        $this->nom_cours = $nom_cours;

        return $this;
    }


    public function getContenuCours()
    {
        return $this->contenu_cours;
    }

    public function setContenuCours($contenu_cours): self
    {
        $this->contenu_cours = $contenu_cours;

        return $this;
    }


    public function getDateCours(): ?\DateTimeInterface
    {
        return $this->date_cours;
    }

    public function setDateCours(\DateTimeInterface $date_cours): self
    {
        $this->date_cours = $date_cours;

        return $this;
    }

    public function getCertifie(): ?bool
    {
        return $this->certifie;
    }

    public function setCertifie(bool $certifie): self
    {
        $this->certifie = $certifie;

        return $this;
    }

    public function getLikeCours(): ?bool
    {
        return $this->like_cours;
    }

    public function setLikeCours(bool $like_cours): self
    {
        $this->like_cours = $like_cours;

        return $this;
    }

    //TODO groupe, matiere, utilisateur, etat,
}
