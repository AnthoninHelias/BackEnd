<?php

namespace Quizz\Controller;

use Quizz\Core\service\TwigService;
use Quizz\Model\connectionModel;

class ConnectionController implements ControllerInterface
{

    public function getOutput()
    {
        $twig = TwigService::getEnvironment();
        echo $twig->render('affichageConnection.html.twig', [
        ]);

        if (isset($_POST["admin"]) and $_POST["pass"]){
            $connection=new connectionModel();
            echo $twig->render('affichageConnection.html.twig', [
                'connection'=>$connection->getAdmin(),
                'admin'=>$_SESSION["admin"]
            ]);
        }
    }

    public function setInput($post, $get, $var)
    {
        // TODO: Implement setInput() method.
    }
}