<?php

namespace Quizz\Core\Controller;

use Quizz\Model\questionnaireModel;
use Quizz\Core\Service\TwigService;

class QuestionnaireController implements ControllerInterface
{
    public function getOutput() {
        if (isset $_POST["libelleQuestionnaire"]){
            $questionnaireModel=new questionnaireModel();
            $questionnaireModel->newQuestionnaire();
        }

        $twig = TwigService::getEnvironment();
        echo $twig->render('newQuestionnaires.html.twig', [
            'questionnaires' => $questionnaireModel->getFetchAll(),

        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}