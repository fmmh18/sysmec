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
$router->get("/sair","UserController:userLogout"); 
$router->get("/sair/{message}","UserController:userLogout"); 
//Usuario
$router->get("/usuario","IndexController:userListPage"); 
$router->get("/usuario/adicionar","IndexController:userAddPage"); 
$router->get("/usuario/adicionar/{message}","IndexController:userAddPage"); 
$router->post("/usuario/adicionar","UserController:userRegister"); 
$router->get("/usuario/editar/{id}","IndexController:userEditPage"); 
$router->get("/usuario/editar/{id}/{message}","IndexController:userEditPage"); 
$router->post("/usuario/editar","UserController:userUpdate"); 
$router->get("/usuario/deletar/{id}","UserController:userDelete"); 
$router->post("/usuario/alterar-status","UserController:userEditStatus");
//Orçamento 
$router->get("/orcamento","IndexController:budgetListPage"); 
$router->post("/orcamento/alterar-status","BudgetController:budgetEditStatus");
$router->get("/orcamento/adicionar","IndexController:budgetAddPage"); 
$router->get("/orcamento/adicionar/{message}","IndexController:budgetAddPage"); 
$router->get("/orcamento/editar/{id}","IndexController:budgetEditPage"); 
$router->get("/orcamento/editar/{id}/{message}","IndexController:budgetEditPage"); 
//Veiculo
$router->get("/veiculo","IndexController:vehicleListPage"); 
$router->post("/veiculo/alterar-status","VehicleController:vehicleEditStatus");
$router->get("/veiculo/adicionar","IndexController:vehicleAddPage"); 
$router->get("/veiculo/adicionar/{message}","IndexController:vehicleAddPage"); 
$router->get("/veiculo/editar/{id}","IndexController:vehicleEditPage"); 
$router->get("/veiculo/editar/{id}/{message}","IndexController:vehicleEditPage"); 


//Exception erro
$router->namespace("app\controller");
$router->group("oops");
$router->get("/{errcode}", "ErrorController:error");

$router->dispatch(); 



if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
 