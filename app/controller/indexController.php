<?php
    
    namespace App\Controller;
    use App\Model\userModel;
 

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
            }else if($data['message'] == 'erro-login'){
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
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        $title = "SysMec - Seu gerenciador de oficina";
        require __DIR__."/../view/page.php";
    }

    public function userListPage($request)
    {
        session_start();
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $users = new userModel;
        $datas = $users::get();

        $levels = ["Sem Perfil","Administrador","Mecanico","Usuário Comum"];
        

        $title = "SysMec - Seu gerenciador de oficina - Lista de Usuários";
        require __DIR__."/../view/user/list.php";
    }

    public function userAddPage()
    {
        session_start();
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $levels = ["Sem Perfil","Administrador","Mecanico","Usuário Comum"];
            
        $subtitle = "Cadastrar";
        $title = "SysMec - Seu gerenciador de oficina - Cadastrar Usuário";
        require __DIR__."/../view/user/form.php";
    }

    public function userEditPage($request)
    {
        session_start();
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $levels = ["Sem Perfil","Administrador","Mecanico","Usuário Comum"];
            
        $users = new userModel;

        $data = $users->userDetail($request['id']);
         

        $subtitle = "Editar";
        $title = "SysMec - Seu gerenciador de oficina - Editar Usuário";
        require __DIR__."/../view/user/form.php";
    }

}