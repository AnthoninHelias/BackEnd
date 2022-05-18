<?php

namespace Quizz\Controller;

use Quizz\Model\reponseModel;
use Quizz\Core\service\TwigService;

class ReponsesController implements ControllerInterface
{

    public function getOutput()
    {
        if (isset($_POST['idReponse'])){
            $reponseModel=new reponseModel();
            $reponseModel->insertReponse();
        }

        $twig = TwigService::getEnvironment();
        $reponseModel = new reponseModel();
        echo $twig->render('affichageReponses.html.twig', [
            'reponses' => $reponseModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}