<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="nomR", type="string", length=255, nullable=false)
     */
    private $nomr;

    /**
     * @var string
     *
     * @ORM\Column(name="sujetR", type="string", length=255, nullable=false)
     */
    private $sujetr;

    /**
     * @var string
     *
     * @ORM\Column(name="dateR", type="string", length=255, nullable=false)
     */
    private $dater;

    public function getIdreclamation(): ?int
    {
        return $this->idreclamation;
    }

    public function getNomr(): ?string
    {
        return $this->nomr;
    }

    public function setNomr(string $nomr): self
    {
        $this->nomr = $nomr;

        return $this;
    }

    public function getSujetr(): ?string
    {
        return $this->sujetr;
    }

    public function setSujetr(string $sujetr): self
    {
        $this->sujetr = $sujetr;

        return $this;
    }

    public function getDater(): ?string
    {
        return $this->dater;
    }

    public function setDater(string $dater): self
    {
        $this->dater = $dater;

        return $this;
    }


}
