
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";
session_start();


/*
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;



$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

dump($context);
$routes = new RouteCollection();
//$routes->add('index', new Route('/index/index/{name}', ['name' => 'World']));
$routes->add('/ville/read', new Route('/ville/read/{id}',['id' => 2,'controller'=>'Ville','target'=>'read']));

//dump($routes);



//dump($request);

$response = new Response('Goodbye!');
//$response->send();

//use User;
$isDevMode = true;
$proxyDir=null;
$cache=null;


$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
$attributes = $matcher->match($request->getPathInfo());
//dump("Attributes",$attributes);
$class="Controllers\\".$matcher->match($attributes['_route'])['controller']."Controller";
//$class="Controllers\\".$matcher->match('/ville/liste')['controller']."Controller";
$class=new $class;
$target=$matcher->match($attributes['_route'])['target'];
$params=["id"=>$matcher->match('/ville/read')['id']];
//dump($attributes);
call_user_func([$class, $target],$attributes["id"]); 
die;

*/
//dump(password_algos());
$class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');

$target = isset($_GET['t']) ? $_GET['t'] : "index";
$getParams = isset($_GET['c']) ? $_GET['c'] : null;
$postParams = isset($_POST) ? $_POST : null;
$params = array(array(
    "url"=>"http://195.154.113.10/pter/backend/bootstrap.php",
    "message"=>(isset($_GET["message"])?$_GET['message']:""),
    "get"=>$getParams,
    "post"=>$postParams
    //"em"=>$entityManager
));
//$class=new $classStr;
if ($class == "Controllers\IndexController" && in_array($target, get_class_methods($class))) // si c = index et qu'on a un t = methode existante de c
{ 
    $class = new Controllers\IndexController; // c = index
    call_user_func_array([$class, $target], $params); // c = index et t = la methode existante
} else 
{ // dans tout les autres cas ou c != index et t n'existe pas alors
    $class = new $class; // c = index 
    call_user_func_array([$class, $target],$params); 
} 
