<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_commentaire;

    /**
     * @ORM\Column(type="blob")
     */
    private $contenu_commentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_commentaire;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="Commentaire")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id_utilisateur")
     */
    private $utilisateur;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Cours", inversedBy="Commentaire")
     * @ORM\JoinColumn(name="cours_id", referencedColumnName="id_cours")
     */
    private $cours;

    public function getIdCommentaire(): ?int
    {
        return $this->id_commentaire;
    }

    public function getContenuCommentaire()
    {
        return $this->contenu_commentaire;
    }

    public function setContenuCommentaire($contenu_commentaire): self
    {
        $this->contenu_commentaire = $contenu_commentaire;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->date_commentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $date_commentaire): self
    {
        $this->date_commentaire = $date_commentaire;

        return $this;
    }

    public function getUtilisateur(){
        return $this->utilisateur;
    }

    public function getCours(){
        return $this->cours;
    }

    //Todo objet cours, utilisateur
}
