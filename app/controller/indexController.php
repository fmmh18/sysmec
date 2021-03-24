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
            }
        }   
        $title = "SysMec - Seu gerenciador de oficina";
        require __DIR__."/../view/login.php";
    }

    public function principalPage()
    {
        session_start();
        $title = "SysMec - Seu gerenciador de oficina";
        require __DIR__."/../view/page.php";
    }

}