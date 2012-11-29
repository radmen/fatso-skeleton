<?php
require '../vendor/autoload.php';

$app = new \Silex\Application();
$app->register(new \Fatso\Provider\FatsoServiceProdiver(), array(
  'config.dir' => __DIR__.'/../config',
  'env.host' => $_SERVER['HTTP_HOST'],
));

$app['bootstrap']->runApplication();