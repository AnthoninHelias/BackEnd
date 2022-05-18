<?php

namespace Quizz\Model;

use Quizz\Core\Service\bddService;
use Quizz\Entity\Reponse;

class NewReponseModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=bddService::getConnect();
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


    public function newReponse()
    {
        $requete=$this->bdd->prepare("INSERT INTO reponse (idReponse,valeur,cheminImage)
        values ({$_POST['idReponse']},'{$_POST['valeur']}','{$_POST['cheminImage']}')");
        $requete->execute();
    }
}