<?php

namespace Quizz\Model;

use Quizz\Entity\Questionquestionnaire;
use Quizz\service\bddService;

class questionquestionnaireModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=bddService::getConnect();
    }

    public function getFetchAll()
    {
        $requete=$this->bdd->prepare("SELECT * FROM questionquestionnaire");
        $requete->execute();
        $tabQuestionquestionnaire=[];
        foreach ($requete->fetchAll() as $value){
            $questionquestionnaire=new Questionquestionnaire($value["idQuestionnaire"], $value["idQuestion"]);
            $tabQuestionquestionnaire[]=$questionquestionnaire;
        }
        return $tabQuestionquestionnaire;
    }

    public function insertQuestionquestionnaire(){
        $requete=$this->bdd->prepare("INSERT INTO questionquestionnaire (idQuestionnaire,idQuestion)
        values ({$_POST['idQuestionnaire']},{$_POST['idQuestion']})");
        $requete->execute();
    }
}