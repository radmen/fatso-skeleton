<?php

namespace App\Provider;

use Symfony\Component\Finder\Finder;

class TwigExtender {
  
  public function setNamespaces(\Silex\Application $app) {
    $namespaces = $this->getNamespaces($app);
    
    $app['twig.loader.filesystem'] = $app->share(function ($app) use ($namespaces) {
        $loader = new \Twig_Loader_Filesystem($app['twig.path']);
        
        foreach($namespaces as $ns => $path) {
          $loader->setPaths($path, $ns);
        }
        
        return $loader;
    });
  }
  
  private function getNamespaces(\Silex\Application $app) {
    static $namespaces = null;
    
    if(null !== $namespaces) {
      return $namespaces;
    }
    
    $namespaces = array();
    $files = Finder::create()
      ->directories()
      ->depth(0)
      ->in($app['src.dir']);
    
    foreach($files as $path) {
      $name = $path->getFilename();
      $full_path = realpath(sprintf('%s/%s/Resources/view', $app['src.dir'], $name));
      
      if(false !== $full_path) {
        $namespaces[$name] = $full_path;
      }
    }
    
    return $namespaces;
  }
  
}