<?php

namespace Quizz\Controller;

use Quizz\Core\View\TwigCore;
use Quizz\Model\QuestionnaireModel;
use Twig\Environment;

class HomeController
{

    public function inputRequest(array $tabInput)
    {
        // Nulle :)
    }

    public function outputEvent()
    {
        // Si y a pas de GET alors j'affiche tout
        return TwigCore::getEnvironment()->render(
            'home/home.html.twig',
            []);
    }
}
