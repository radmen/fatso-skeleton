<?php
require '../vendor/autoload.php';

$app = new \Silex\Application();
$app->register(new \Fatso\Provider\FatsoServiceProdiver(), array(
  'config.dir' => __DIR__.'/../config',
  'src.dir' => __DIR__.'/../src',
  'env.host' => $_SERVER['HTTP_HOST'],
));

$bootstrap = new \Fatso\Bootstrap($app);
$bootstrap->runApplication();