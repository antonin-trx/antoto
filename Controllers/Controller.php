<?php

namespace Controllers;
use \Twig\src\Loader;
use \Twig_Environment;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Controller
{
    protected $twig;
    protected $em;
    
    function __construct()
    {
        $className = substr(get_class($this), 12, -10);
        
        if ($className){
            $path=strtolower($className);
        }
        else {
            $path="";
        }
        
        $loader= new \Twig\Loader\FilesystemLoader('./views');
        $this->twig = new \Twig\Environment($loader, array(
            'cache' => false,
            'debug' => true,
        ));
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        //****************************************
        $isDevMode = true;
        $proxyDir=null;
        $cache=null;
        // the connection configuration
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'antonin',
            'password' => 'plop',
            'dbname'   => 'antonin_geo',
        );
        $useSimpleAnnotationReader = false;
        $config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__."/src/"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
        //$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->em = EntityManager::create($dbParams, $config);
    }
}