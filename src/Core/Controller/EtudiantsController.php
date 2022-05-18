<?php

namespace Quizz\Controller;

use Quizz\Model\etudiantModel;
use Quizz\core\service\TwigService;

class EtudiantsController implements ControllerInterface
{

    public function getOutput()
    {
        $twig = TwigService::getEnvironment();
        $etudiantModel = new etudiantModel();
        echo $twig->render('affichageEtudiants.html.twig', [
            'etudiants' => $etudiantModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}