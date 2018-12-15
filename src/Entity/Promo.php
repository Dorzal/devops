<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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

    /**
     * Many promo have Many matiere.
     * @ORM\ManyToMany(targetEntity="Matiere")
     * @ORM\JoinTable(name="promo_matieres",
     *      joinColumns={@ORM\JoinColumn(name="promo_id", referencedColumnName="id_promo")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="matiere_id", referencedColumnName="id_matiere")}
     *      )
     */
    private $matieres;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Diplome", inversedBy="promosbydiplomes")
     * @ORM\JoinColumn(name="diplome_id", referencedColumnName="id_diplome")
     */
    private $diplomes;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Etude", inversedBy="promos")
     * @ORM\JoinColumn(name="etude_id", referencedColumnName="id_etude")
     */
    private $etude;


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

    public function getMatieres(){
        return $this->matieres;
    }

    public function getDiplomes(){
        return $this->diplomes;
    }

    public function getEtude(){
        return $this->etude;
    }




    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->diplomes = new ArrayCollection();
    }
}
