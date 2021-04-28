<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", uniqueConstraints={@ORM\UniqueConstraint(name="uniqueEval_nom", columns={"eval_nom"})}, indexes={@ORM\Index(name="FK_ForeignKey_id_Form", columns={"id_form"})})
 * @ORM\Entity(repositoryClass="App\Repository\EvaluationRepository")
 */
class Evaluation
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
     * @ORM\Column(name="eval_nom", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="le nom d'évaluation est vide")
     */

    private $evalNom;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="il faut mettre une description !")
     */
    private $description;

    /**
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_form", referencedColumnName="id")
     * })
     * @Assert\NotBlank(message="il faut sélectionner une formation !")
     */
    private $idForm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvalNom(): ?string
    {
        return $this->evalNom;
    }

    public function setEvalNom(string $evalNom): self
    {
        $this->evalNom = $evalNom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdForm(): ?Formation
    {
        return $this->idForm;
    }

    public function setIdForm(?Formation $idForm): self
    {
        $this->idForm = $idForm;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId().'- '.$this->getEvalNom();
    }
}
