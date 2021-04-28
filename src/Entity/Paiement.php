<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity
 */
class Paiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="modedepaiement", type="string", length=20, nullable=false)
     */
    private $modedepaiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateexpiration", type="date", nullable=false)
     */
    private $dateexpiration;

    /**
     * @var int
     *
     * @ORM\Column(name="numerocarte", type="integer", nullable=false)
     */
    private $numerocarte;

    /**
     * @var int
     *
     * @ORM\Column(name="cryptogramme", type="integer", nullable=false)
     */
    private $cryptogramme;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getModedepaiement(): ?string
    {
        return $this->modedepaiement;
    }

    public function setModedepaiement(string $modedepaiement): self
    {
        $this->modedepaiement = $modedepaiement;

        return $this;
    }

    public function getDateexpiration(): ?\DateTimeInterface
    {
        return $this->dateexpiration;
    }

    public function setDateexpiration(\DateTimeInterface $dateexpiration): self
    {
        $this->dateexpiration = $dateexpiration;

        return $this;
    }

    public function getNumerocarte(): ?int
    {
        return $this->numerocarte;
    }

    public function setNumerocarte(int $numerocarte): self
    {
        $this->numerocarte = $numerocarte;

        return $this;
    }

    public function getCryptogramme(): ?int
    {
        return $this->cryptogramme;
    }

    public function setCryptogramme(int $cryptogramme): self
    {
        $this->cryptogramme = $cryptogramme;

        return $this;
    }


}
