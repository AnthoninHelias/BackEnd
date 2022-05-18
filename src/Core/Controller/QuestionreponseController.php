<?php

namespace Quizz\Controller;

use Quizz\Model\questionreponseModel;
use Quizz\core\service\TwigService;

class QuestionreponseController implements ControllerInterface
{

    public function getOutput()
    {
        if (isset($_POST["idQuestion"]) and $_POST["idReponse"] and $_POST["ordre"] and $_POST["bonne"]){
            $questionreponseModel=new questionreponseModel();
            $questionreponseModel->insertQuestionreponse();
        }

        $twig = TwigService::getEnvironment();
        $questionreponseModel = new questionreponseModel();
        echo $twig->render('affichageAttribuerReponse.html.twig', [
            'questionreponse' => $questionreponseModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}