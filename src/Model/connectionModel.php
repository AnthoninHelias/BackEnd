<?php

namespace Quizz\Model;

use Quizz\Core\Service\bddService;


class connectionModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd=bddService::getConnect();

    }

    public function getAdmin()
    {
        if ($_POST["admin"]==$_ENV["LOGIN_ADMIN"] and $_POST["pass"]==$_ENV["MDP_ADMIN"])
        {
            $connection=true;
        }
        else
        {
            $connection=false;
        }
        return $connection;
    }
}