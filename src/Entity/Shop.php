<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop")
 * @ORM\Entity
 */
class Shop
{
    /**
     * @var int
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ref;

    /**
     * @var int
     *
     * @ORM\Column(name="nomformation", type="integer", nullable=false)
     */
    private $nomformation;

    /**
     * @var int
     *
     * @ORM\Column(name="prixinitiale", type="integer", nullable=false)
     */
    private $prixinitiale;

    /**
     * @var int
     *
     * @ORM\Column(name="reduction", type="integer", nullable=false)
     */
    private $reduction;

    /**
     * @var int
     *
     * @ORM\Column(name="prixfinal", type="integer", nullable=false)
     */
    private $prixfinal;

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function getNomformation(): ?int
    {
        return $this->nomformation;
    }

    public function setNomformation(int $nomformation): self
    {
        $this->nomformation = $nomformation;

        return $this;
    }

    public function getPrixinitiale(): ?int
    {
        return $this->prixinitiale;
    }

    public function setPrixinitiale(int $prixinitiale): self
    {
        $this->prixinitiale = $prixinitiale;

        return $this;
    }

    public function getReduction(): ?int
    {
        return $this->reduction;
    }

    public function setReduction(int $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getPrixfinal(): ?int
    {
        return $this->prixfinal;
    }

    public function setPrixfinal(int $prixfinal): self
    {
        $this->prixfinal = $prixfinal;

        return $this;
    }


}
