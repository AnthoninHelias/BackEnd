<?php

namespace Quizz\Model;

use Quizz\service\Core\bddService;
use Quizz\Entity\Qcmfait;

class qcmfaitModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=serviceBDD::getConnect();
    }

    public function getFetchAll(){
        $requete=$this->bdd->prepare("SELECT * FROM qcmfait");
        $requete->execute();
        $tabQcmfait=[];
        foreach ($requete->fetchAll() as $value)
        {
            $qcmfait=new Qcmfait($value["idEtudiant"], $value["idQuestionnaire"], $value["dateFait"], $value["point"]);
            $tabQcmfait[]=$qcmfait;
        }
        return $tabQcmfait;
    }
}