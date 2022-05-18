<?php

namespace Quizz\Controller;

use Quizz\Model\questionnaireModel;
use Quizz\core\service\TwigService;

class QuestionnairesController implements ControllerInterface
{
    public function getOutput() {
        if (isset($_POST["libelleQuestionnaire"])){
            $questionnaireModel=new questionnaireModel();
            $questionnaireModel->insertQuestionnaire();
        }

        $twig = TwigService::getEnvironment();
        $questionnaireModel = new questionnaireModel();

        echo $twig->render('affichageQuestionnaires.html.twig', [
            'questionnaires' => $questionnaireModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}