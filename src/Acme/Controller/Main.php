<?php

namespace Acme\Controller;

use Silex\Application;

class Main {
  
  public function index(Application $app) {
    return $app['twig']->render('@Acme/hello.html.twig');
  }
  
}
