<?php

namespace Quizz\Controller;

use Quizz\core\service\TwigService;
use Quizz\Model\questionnaireModel;

class QuestionController implements ControllerInterface
{
    public function getOutput() {
        // TWIG
        $twig = TwigService::getEnvironment();
        $questionnaireModel = new questionnaireModel();
        if (isset($this->libelleQuestionnaire)) {
            echo $twig->render('affichageQuestionnaire.html.twig', [
                'questionnaire' => $questionnaireModel->getFetchId((int) $this->idQuestion)
            ]);
        }
    }

    public function setInput($get, $post, $vars)
    {
        $this->libelleQuestionnaire=$vars["id"];
    }
}