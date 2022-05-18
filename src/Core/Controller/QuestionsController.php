<?php

namespace Quizz\Controller;

use Quizz\core\service\TwigService;
use Quizz\Model\questionModel;

class QuestionsController implements ControllerInterface
{

    public function getOutput()
    {
        if (isset($_POST["idQuestion"]) and $_POST["libelleQuestion"] and $_POST["nbReponse"] and $_POST["nbBonneReponse"]){
            $questionModel=new questionModel();
            $questionModel->insertQuestion();
        }

        $twig = TwigService::getEnvironment();
        $questionModel = new questionModel();
        echo $twig->render('affichageQuestions.html.twig', [
            'questions' => $questionModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}