<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actualite
 *
 * @ORM\Table(name="actualite")
 * @ORM\Entity
 */
class Actualite
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
     * @ORM\Column(name="objet", type="string", length=20, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="dateD", type="string", length=255, nullable=false)
     */
    private $dated;

    /**
     * @var string
     *
     * @ORM\Column(name="dateF", type="string", length=255, nullable=false)
     */
    private $datef;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getDated(): ?string
    {
        return $this->dated;
    }

    public function setDated(string $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getDatef(): ?string
    {
        return $this->datef;
    }

    public function setDatef(string $datef): self
    {
        $this->datef = $datef;

        return $this;
    }


}
