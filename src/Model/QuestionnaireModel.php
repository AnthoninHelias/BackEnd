<?php

namespace Quizz\Model;

use Quizz\Core\Service\BddService;
use Quizz\Entity\Questionnaire;

class QuestionnaireModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = BddService::getConnect();
    }

    public function getFechAll()
    {

        $requete = $this->bdd->prepare('SELECT MAX(idQuestionnaire) FROM questionnaire');
        $idQuest = $requete->execute();
        $idQuest = $idQuest + 1;

        foreach ($requete->fetchAll() as $valeur) {

            $newQuestionnaire = new Questionnaire();
            $newQuestionnaire->setIdQuestionnaire($valeur["$idQuest"]);
            $newQuestionnaire->setLibelleQuestionnaire($valeur["libelleQuestionnaire"]);

            return $newQuestionnaire;

        }

    }
}

