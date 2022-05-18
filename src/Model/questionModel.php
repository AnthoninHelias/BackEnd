<?php

namespace Quizz\Model;

use Quizz\Entity\Question;
use Quizz\service\bddService;

class questionModel
{
    private $bdd;
    
    public function __construct()
    {
        $this->bdd=bddService::getConnect();
    }
    
    public function getFetchAll(){
        $requete=$this->bdd->prepare("SELECT * FROM question");
        $requete->execute();
        $tab=[];
        foreach ($requete->fetchAll() as $question){
            $question=new Question($question["idQuestion"], $question["libelleQuestion"], $question["type"], $question["nbReponse"], $question["nbBonneReponse"]);
            $tab[]=$question;
        }
        return $tab;
    }
    
    public function getFetchByQuestionnaire(){
        $requete=$this->bdd->prepare("SELECT * FROM question,questionquestionnaire,questionnaire 
                                            WHERE question.idQuestion=questionquestionnaire.idQuestion 
                                            AND questionquestionnaire.idQuestionnaire=questionnaire.idQuestionnaire 
                                           ");
        $requete->execute();

        foreach ($requete->fetchAll() as $question) {
            $question=new Question($question["idQuestion"], $question["libelleQuestion"], $question["type"], $question["nbReponse"], $question["nbBonneReponse"]);
        }
    }

    public function insertQuestion(){
        $requete=$this->bdd->prepare("INSERT INTO question (idQuestion,libelleQuestion,type,nbReponse,nbBonneReponse)
        values ({$_POST['idQuestion']},'{$_POST['libelleQuestion']}',1,{$_POST['nbReponse']},{$_POST['nbBonneReponse']})");
        $requete->execute();
    }
    
}