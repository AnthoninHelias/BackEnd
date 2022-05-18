<?php

namespace Quizz\Controller;

use Quizz\Model\questionquestionnaireModel;
use Quizz\core\service\TwigService;

class QuestionquestionnaireController implements ControllerInterface
{

    public function getOutput()
    {
        if (isset($_POST["idQuestionnaire"]) and $_POST["idQuestion"]){
            $questionquestionnaireModel=new questionquestionnaireModel();
            $questionquestionnaireModel->insertQuestionquestionnaire();
        }

        $twig = TwigService::getEnvironment();
        $questionquestionnaireModel = new questionquestionnaireModel();
        echo $twig->render('affichageQuestionquestionnaire.html.twig', [
            'questionquestionnaire' => $questionquestionnaireModel->getFetchAll()
        ]);
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}