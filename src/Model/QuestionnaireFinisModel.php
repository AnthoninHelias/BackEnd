<?php

namespace Quizz\Model;

use Quizz\Core\Service\bddService;
use Quizz\Entity\Qcmfait;

class QuestionnaireFinisModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=bddService::getConnect();
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