<?php
    
    namespace App\Controller;
 

class indexController
{
    public function loginPage($data)
    { 
        if(!empty($data['message'])){
            if($data['message'] == 'sucesso'){
                $message_title = "Sucesso";
                $message = "Cadastro efetuado."; 
            }else if($data['message'] == 'erro-cpf-cnpj'){
                $message_title = "Erro";
                $message = "Usuário já possui cadastro."; 
            }else if($data['message'] == 'erro'){
                $message_title = "Erro";
                $message = "Cadastro não efetuado."; 
            }else if($data['message'] == 'usuario-nao-logado'){
                $message_title = "Erro";
                $message = "Usuário não logado."; 
            }
        }   
        $title = "SysMec - Seu gerenciador de oficina";
        require __DIR__."/../view/login.php";
    }

    public function principalPage()
    {
        session_start();
        if(empty($_SESSION)){
            header("location: ".getenv('APP_HOST')."sair/usuario-nao-logado");
        }
        $title = "SysMec - Seu gerenciador de oficina";
        require __DIR__."/../view/page.php";
    }

    public function userListPage($request)
    {
        session_start();
        if(empty($_SESSION)){
            header("location: ".getenv('APP_HOST')."sair/usuario-nao-logado");
        }
        $title = "SysMec - Seu gerenciador de oficina";
        require __DIR__."/../view/page.php";
    }

}