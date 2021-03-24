<?php 

require __DIR__ . '/vendor/autoload.php';

use CoffeeCode\Router\Router;  

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

if(getenv('APP_DEBUG') == TRUE){
    
    error_reporting(E_ALL);
    ini_set('display_errors', true);
}

include __DIR__ . '/src/depedencie.php';

$router = new Router(getenv('APP_HOST'));

//Rota do Site
$router->namespace("app\controller");
$router->group(null);
$router->get("/","IndexController:loginPage"); 
$router->get("/{message}","IndexController:loginPage"); 
$router->post("/registrar","UserController:userRegister");  
$router->post("/login","UserController:userAuthenticate");  
$router->get("/principal","IndexController:principalPage"); 
$router->get("/sair","IndexController:userLogout"); 


//Exception erro
$router->namespace("app\controller");
$router->group("oops");
$router->get("/{errcode}", "ErrorController:error");

$router->dispatch(); 



if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
 