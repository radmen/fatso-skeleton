<?php

namespace App\Controller;

use Silex\Application;

class Main {
  
  public function index(Application $app) {
    return $app['twig']->render('hello.html.twig');
  }
  
}
