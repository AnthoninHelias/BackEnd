<?php

namespace Quizz\Entity;

class Qcmfait
{
    private $idEtudiant;
    private $idQuestionnaire;
    private $dateFait;
    private $point;

    /**
     * @param int $idEtudiant
     * @param int $idQuestionnaire
     * @param string $dateFait
     * @param int $point
     */
    public function __construct(int $idEtudiant, int $idQuestionnaire, string $dateFait, int $point)
    {
        $this->idEtudiant = $idEtudiant;
        $this->idQuestionnaire = $idQuestionnaire;
        $this->dateFait = $dateFait;
        $this->point = $point;
    }


    /**
     * @return int
     */
    public function getIdEtudiant(): int
    {
        return $this->idEtudiant;
    }

    /**
     * @param int $idEtudiant
     */
    public function setIdEtudiant(int $idEtudiant): void
    {
        $this->idEtudiant = $idEtudiant;
    }

    /**
     * @return int
     */
    public function getIdQuestionnaire(): int
    {
        return $this->idQuestionnaire;
    }

    /**
     * @param int $idQuestionnaire
     */
    public function setIdQuestionnaire(int $idQuestionnaire): void
    {
        $this->idQuestionnaire = $idQuestionnaire;
    }

    /**
     * @return string
     */
    public function getDateFait(): string
    {
        return $this->dateFait;
    }

    /**
     * @param string $dateFait
     */
    public function setDateFait(string $dateFait): void
    {
        $this->dateFait = $dateFait;
    }

    /**
     * @return int
     */
    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint(int $point): void
    {
        $this->point = $point;
    }



}