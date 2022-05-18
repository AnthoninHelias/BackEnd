<?php

namespace Quizz\Service\TwigService;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    private static $twig;

    public static function getEnvironnement(): Environment{
        if (!self::$twig){
            $loader = new FilesystemLoader(__DIR__ . "/../../templates");
            self::$twig = new \Twig\Environment($loader, [
                //'cache' => '/path/to/compilation_cache',
            ]);
        }
        return self::$twig;
    }
}