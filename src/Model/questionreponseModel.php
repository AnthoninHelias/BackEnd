<?php

namespace Quizz\Model;

use Quizz\Entity\Questionreponse;
use Quizz\service\serviceBDD;

class questionreponseModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=serviceBDD::getConnect();
    }

    public function getFetchAll()
    {
        $requete=$this->bdd->prepare("SELECT * FROM questionreponse");
        $requete->execute();
        $tabQuestionreponse=[];
        foreach ($requete->fetchAll() as $value){
            $questionreponse=new Questionreponse($value["idQuestion"], $value["idReponse"],$value["ordre"],$value["bonne"]);
            $tabQuestionreponse[]=$questionreponse;
        }
        return $tabQuestionreponse;
    }

    public function insertQuestionreponse()
    {
        $requete=$this->bdd->prepare("INSERT INTO questionreponse (idQuestion,idReponse,ordre,bonne)
        values ({$_POST['idQuestion']},{$_POST['idReponse']},{$_POST['ordre']},{$_POST['bonne']})");
        $requete->execute();
    }
}