<?php

namespace Site\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Index extends AbstractController
{
    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('index.php');
    }
}

