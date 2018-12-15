<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="Cours")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id_utilisateur")
     */
    private $utilisateur;


    /**
     * Many fav have Many Utilisateurs.
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="Cours")
     */
    private $utilisateursFav;


    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Matiere", inversedBy="coursparmatiere")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id_matiere")
     */
    private $matieres;


    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Groupe")
     * @ORM\JoinTable(name="cours_groups",
     *      joinColumns={@ORM\JoinColumn(name="cours_id", referencedColumnName="id_cours")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id_groupe")}
     *      )
     */
    private $groups;



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

    public function getUtilisateur() {
        return $this->utilisateur;
    }

    public function getUtilisateurFav() {
        return $this->utilisateursFav;
    }

    public function getMatieres(){
        return $this->matieres;
    }

    public function getGroups(){
        return $this->groups;
    }

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }


    //TODO groupe, matiere, utilisateur, etat,
}
