<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultat
 *
 * @ORM\Table(name="resultat", indexes={@ORM\Index(name="id_etud", columns={"id_etud"}), @ORM\Index(name="nom_eval", columns={"nom_eval"}), @ORM\Index(name="fk_res_eval", columns={"id_evaluation"})})
 * @ORM\Entity(repositoryClass="App\Repository\ResultatRepository")
 */
class Resultat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_res", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRes;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_eval", type="string", length=255, nullable=false)
     */
    private $nomEval;

    /**
     * @var \Evaluation
     *
     * @ORM\ManyToOne(targetEntity="Evaluation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evaluation", referencedColumnName="id")
     * })
     */
    private $idEvaluation;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_etud", referencedColumnName="idu")
     * })
     */
    private $idEtud;

    public function getIdRes(): ?int
    {
        return $this->idRes;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getNomEval(): ?string
    {
        return $this->nomEval;
    }

    public function setNomEval(string $nomEval): self
    {
        $this->nomEval = $nomEval;

        return $this;
    }

    public function getIdEvaluation(): ?Evaluation
    {
        return $this->idEvaluation;
    }

    public function setIdEvaluation(?Evaluation $idEvaluation): self
    {
        $this->idEvaluation = $idEvaluation;

        return $this;
    }

    public function getIdEtud(): ?User
    {
        return $this->idEtud;
    }

    public function setIdEtud(?User $idEtud): self
    {
        $this->idEtud = $idEtud;

        return $this;
    }


}
