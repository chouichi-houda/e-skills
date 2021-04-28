<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="id_eva", columns={"eval_nom"}), @ORM\Index(name="Fk_Form_Eval", columns={"evaluation_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_qu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numQu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eval_nom", type="string", length=255, nullable=true)
     */
    private $evalNom;

    /**
     * @var string
     * @Assert\NotBlank(message="texte question!")
     * @ORM\Column(name="text_qu", type="string", length=255, nullable=false)
     */
    private $textQu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="choix1", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="choix 1!")
     */
    private $choix1;

    /**
     * @var string|null
     * @Assert\NotBlank(message="choix 2!")
     * @ORM\Column(name="choix2", type="string", length=255, nullable=true)
     */
    private $choix2;

    /**
     * @var string|null
     * @Assert\NotBlank(message="choix 3!")
     * @ORM\Column(name="choix3", type="string", length=255, nullable=true)
     */
    private $choix3;

    /**
     * @var string|null
     * @Assert\NotBlank(message="choix 4!")
     * @ORM\Column(name="choix4", type="string", length=255, nullable=true)
     */
    private $choix4;

    /**
     * @var string
     * @Assert\NotBlank(message="réponse correcte!")
     * @ORM\Column(name="rep_corr", type="string", length=255, nullable=false)
     */
    private $repCorr;

    /**
     * @var \Evaluation
     *
     * @ORM\ManyToOne(targetEntity="Evaluation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     * })
     */
    private $evaluation;

    public function getNumQu(): ?int
    {
        return $this->numQu;
    }

    public function getEvalNom(): ?string
    {
        return $this->evalNom;
    }

    public function setEvalNom(?string $evalNom): self
    {
        $this->evalNom = $evalNom;

        return $this;
    }

    public function getTextQu(): ?string
    {
        return $this->textQu;
    }

    public function setTextQu(string $textQu): self
    {
        $this->textQu = $textQu;

        return $this;
    }

    public function getChoix1(): ?string
    {
        return $this->choix1;
    }

    public function setChoix1(?string $choix1): self
    {
        $this->choix1 = $choix1;

        return $this;
    }

    public function getChoix2(): ?string
    {
        return $this->choix2;
    }

    public function setChoix2(?string $choix2): self
    {
        $this->choix2 = $choix2;

        return $this;
    }

    public function getChoix3(): ?string
    {
        return $this->choix3;
    }

    public function setChoix3(?string $choix3): self
    {
        $this->choix3 = $choix3;

        return $this;
    }

    public function getChoix4(): ?string
    {
        return $this->choix4;
    }

    public function setChoix4(?string $choix4): self
    {
        $this->choix4 = $choix4;

        return $this;
    }

    public function getRepCorr(): ?string
    {
        return $this->repCorr;
    }

    public function setRepCorr(string $repCorr): self
    {
        $this->repCorr = $repCorr;

        return $this;
    }

    public function getEvaluation(): ?Evaluation
    {
        return $this->evaluation;
    }

    public function setEvaluation(?Evaluation $evaluation): self
    {
        $this->evaluation = $evaluation;

        return $this;
    }


}
