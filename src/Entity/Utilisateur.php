<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_utilisateur;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $photo = "https://blogcdn1.secureserver.net/wp-content/uploads/2014/06/create-a-gravatar-beard.png";

    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twitter;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * Many Utilisateurs have Many Groupes.
     * @ORM\ManyToMany(targetEntity="Groupe")
     * @ORM\JoinTable(name="users_groups",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id_utilisateur")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id_groupe")}
     *      )
     */
    private $groupes;

    /**
     * Many Utilisateurs have Many Groupes.
     * @ORM\ManyToMany(targetEntity="Cours")
     * @ORM\JoinTable(name="favoris",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id_utilisateur")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="cours_id", referencedColumnName="id_cours")}
     *      )
     */
    private $favoris;


    /**
     * @ORM\ManyToOne(targetEntity="Promo")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="id_promo")
     */
    private $promo;

    /**
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumn(name="statut_id", referencedColumnName="id_statut")
     */
    private $statut;

    /**
     * Many Users have Many Users.
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * Many Users have many Users.
     * @ORM\ManyToMany(targetEntity="Utilisateur", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id_utilisateur")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id_utilisateur")}
     *      )
     */
    private $myFriends;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Commentaire", mappedBy="Utilisateur")
     */
    private $commentaires;


    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="Etude")
     * @ORM\JoinColumn(name="etude_id", referencedColumnName="id_etude")
     */
    private $etude;


    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Cours", mappedBy="Utilisateur")
     */
    private $mescours;

    public function __construct() {
        $this->groupes = new ArrayCollection();
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
        $this->commentaires = new arrayCollection();
        $this->mescours = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->roles = array('ROLE_USER');
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->id_utilisateur;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getPromo(): ?string
    {
        return $this->promo;
    }

    public function setPromo(?string $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->promo = $statut;

        return $this;
    }

    public function getGroupes()
    {
        return $this->groupes;
    }

    public function getFavoris(){
        return $this->favoris;
    }

    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    public function getMyFriends()
    {
        return $this->myFriends;
    }

    public function getCommentaires(){
        return $this->commentaires;
    }

    public function getMesCours(){
        return $this->mescours;
    }

    public function getEtude() {
        return $this->etude;
    }








}
