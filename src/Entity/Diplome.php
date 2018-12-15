<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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


    /**
     * Many promo have Many matiere.
     * @ORM\ManyToMany(targetEntity="Promo")
     * @ORM\JoinTable(name="diplome_promo",
     *      joinColumns={@ORM\JoinColumn(name="diplome_id", referencedColumnName="id_diplome")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="promo_id", referencedColumnName="id_promo")}
     *      )
     */
    private $promos;


    /**
     * One product has many features. This is the inverse side.
     * @OneToMany(targetEntity="Promo", mappedBy="diplomes")
     */
    private $promosbydiplomes;


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

    public function getPromos(){
        return $this->promos;
    }

    public function getPromosByDiplomes(){
        return $this->promosbydiplomes;
    }

    public function __construct(){
        $this->promos = new ArrayCollection();
        $this->promosbydiplomes = new ArrayCollection();
    }


}
