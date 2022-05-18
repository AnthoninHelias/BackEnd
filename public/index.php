<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Quizz\Core\Controller\FastRouteCore;
// Gestion des fichiers environnement
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Couche Controller
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/questionnaires', 'Quizz\Core\Controller\QuestionnairesController');
    $route->addRoute('GET', '/questions', 'Quizz\Core\Controller\QuestionsController');
    $route->addRoute('GET', '/questionreponse', 'Quizz\Core\Controller\QuestionreponseController');
    $route->addRoute('GET', '/connection', 'Quizz\Core\Controller\ConnectionController');
    $route->addRoute('GET', '/qcmfait', 'Quizz\Core\Controller\QcmfaitController');
    $route->addRoute('GET', '/etudiants', 'Quizz\Core\Controller\EtudiantsController');
    $route->addRoute('GET', '/reponses', 'Quizz\Core\Controller\ReponsesController');
    $route->addRoute('GET', '/question/{id:\d+}', 'Quizz\Core\Controller\QuestionController');
    $route->addRoute('GET', '/', 'Quizz\Core\Controller\QuestionnairesController');
    $route->addRoute('GET', '/questionquestionnaire', 'Quizz\Core\Controller\QuestionquestionnaireController');
    $route->addRoute('POST', '/questionquestionnaire', 'Quizz\Core\Controller\QuestionquestionnaireController');
    $route->addRoute('POST', '/reponses', 'Quizz\Core\Controller\ReponsesController');
    $route->addRoute('POST', '/', 'Quizz\Core\Controller\QuestionnairesController');
    $route->addRoute('POST', '/questionreponse', 'Quizz\Core\Controller\QuestionreponseController');
    $route->addRoute('POST', '/connection', 'Quizz\Core\Controller\ConnectionController');
    $route->addRoute('POST', '/questionnaires', 'Quizz\Core\Controller\QuestionnairesController');
    $route->addRoute('POST', '/questions', 'Quizz\Core\Controller\QuestionsController');
});
// Dispatcher -> Couche view
echo FastRouteCore::getDispatcher($dispatcher);
