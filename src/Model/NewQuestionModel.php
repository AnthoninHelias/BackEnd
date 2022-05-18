<?php

namespace Quizz\Model;

use Quizz\Entity\Question;
use Quizz\Core\Service\bddService;

class NewQuestionModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=bddService::getConnect();
    }

    public function getFetchAll(){
        $requete=$this->bdd->prepare("SELECT * FROM question");
        $requete->execute();
        $tabQuestion=[];
        foreach ($requete->fetchAll() as $question){
            $question=new Question($question["idQuestion"], $question["libelleQuestion"], $question["type"], $question["nbReponse"], $question["nbBonneReponse"]);
            $tabQuestion[]=$question;
        }
        return $tabQuestion;
    }

    public function NewQuestion(){
        $requete->prepare('SELECT MAX(idQuestion) FROM question');
        $idQuestion=$requete->execute();
        $requete=$this->bdd->prepare("INSERT INTO question (idQuestion,libelleQuestion,type,nbReponse,nbBonneReponse)
        values ({['$idQuestion']},'{$_POST['libelleQuestion']}',1,{$_POST['nbReponse']},{$_POST['nbBonneReponse']})");
        $requete->execute();
    }

}