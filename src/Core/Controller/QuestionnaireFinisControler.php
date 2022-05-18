<?php

namespace Quizz\Core\Controller;

use Quizz\Model\QuestionnaireFinisModel;
use Quizz\Core\Service\TwigService;

class QuestionnaireFinisControler implements ControllerInterface
{

    public function getOutput()
    {
        $twig = TwigService::getEnvironment();
        $qcmfaitModel = new qcmfaitModel();
        echo $twig->render('QuestionnaireFinis.html.twig', [
            'qcmFaits' => $qcmfaitModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}