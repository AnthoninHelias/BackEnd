<?php

namespace Quizz\Controller;

use Quizz\Core\service\TwigService;
use Quizz\Model\questionModel;

class NewQuestionController implements ControllerInterface
{

    public function getOutput()
    {

        if (isset( $_POST["libelleQuestion"] and $_POST["nbReponse"] and $_POST["nbBonneReponse"]){
            $questionModel=new questionModel();
            $questionModel->insertQuestion();
        }

        $twig = TwigService::getEnvironment();
        $questionModel = new questionModel();
        echo $twig->render('NewQuestionModel.html.twig', [
            'NewQuestionModel' => $questionModel->getFetchAll(),
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}