<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity
 */
class Cours
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
     * @var int
     *
     * @ORM\Column(name="titrecours", type="integer", nullable=false)
     */
    private $titrecours;

    /**
     * @var int
     *
     * @ORM\Column(name="description", type="integer", nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="durée", type="integer", nullable=false)
     */
    private $durée;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrecours(): ?int
    {
        return $this->titrecours;
    }

    public function setTitrecours(int $titrecours): self
    {
        $this->titrecours = $titrecours;

        return $this;
    }

    public function getDescription(): ?int
    {
        return $this->description;
    }

    public function setDescription(int $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDurée(): ?int
    {
        return $this->durée;
    }

    public function setDurée(int $durée): self
    {
        $this->durée = $durée;

        return $this;
    }


}
