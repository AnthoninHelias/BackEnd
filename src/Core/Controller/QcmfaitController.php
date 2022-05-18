<?php

namespace Quizz\Controller;

use Quizz\Model\qcmfaitModel;
use Quizz\Core\service\TwigService;

class QcmfaitController implements ControllerInterface
{

    public function getOutput()
    {
        $twig = TwigService::getEnvironment();
        $qcmfaitModel = new qcmfaitModel();
        echo $twig->render('affichageQcmFaits.html.twig', [
            'qcmFaits' => $qcmfaitModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}