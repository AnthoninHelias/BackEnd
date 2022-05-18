<?php

namespace Quizz\Model;

use Quizz\Entity\Reponse;
use Quizz\service\serviceBDD;

class reponseModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=serviceBDD::getConnect();
    }

    public function getFetchAll(){
        $requete=$this->bdd->prepare("SELECT * FROM reponse");
        $requete->execute();
        $tabReponse=[];
        foreach ($requete->fetchAll() as $value)
        {
            $reponse=new Reponse($value["idReponse"], $value["valeur"], $value["cheminImage"]);
            $tabReponse[]=$reponse;
        }
        return $tabReponse;
    }

    public function getFetchByQuestion(int $id){
        $requete=$this->bdd->prepare("SELECT * FROM reponse,questionreponse,question 
                                            WHERE reponse.idReponse=questionreponse.idReponse 
                                            AND questionreponse.idQuestion=question.idQuestion 
                                            AND question.idQuestion={$id}");
        $requete->execute();
        $tabReponseByQuestion=[];
        foreach ($requete->fetchAll() as $value)
        {
            $reponse=new Reponse($value["idReponse"], $value["valeur"], $value["cheminImage"]);
            $tabReponseByQuestion[]=$reponse;
        }
        return $tabReponseByQuestion;
    }

    public function insertReponse()
    {
        $requete=$this->bdd->prepare("INSERT INTO reponse (idReponse,valeur,cheminImage)
        values ({$_POST['idReponse']},'{$_POST['valeur']}','{$_POST['cheminImage']}')");
        $requete->execute();
    }
}