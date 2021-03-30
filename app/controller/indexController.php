<?php
    
    namespace App\Controller;
    use App\Model\userModel;
    use App\Model\budgetModel;
    use App\Model\vehicleModel;
 

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

    public function userAddPage($data)
    {
        session_start();
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

        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $levels = ["Sem Perfil","Administrador","Mecanico","Usuário Comum"];
        
        $hidden_action = $_GET['route'];
        $subtitle = "Cadastrar";
        $button_action = "Adicionar";
        $title = "SysMec - Seu gerenciador de oficina - Cadastrar Usuário";
        require __DIR__."/../view/user/form.php";
    }

    public function userEditPage($data)
    {
        session_start();
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
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $levels = ["Sem Perfil","Administrador","Mecanico","Usuário Comum"];
            
        $users = new userModel;

        $row = $users->userDetail($data['id']);
         
        $hidden_action = substr($_GET['route'],0,15);
        $subtitle = "Editar";
        $button_action = "Editar";
        $title = "SysMec - Seu gerenciador de oficina - Editar Usuário";
        require __DIR__."/../view/user/form.php";
    }

    public function budgetListPage()
    {
        session_start();
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $budgets = new budgetModel;

        if($_SESSION['uLevel'] == 2)
        {
            $datas = $budgets::where('id_oficina',$_SESSION['uID'])->all();
        }
        else if($_SESSION['uLevel'] == 3)
        {
            $datas = $budgets::where('id_usuario',$_SESSION['uID'])->all();
        }
        else
        {
            $datas = $budgets::all();
        }

        
        $title = "SysMec - Seu gerenciador de oficina - Lista de Orçamentos";
        require __DIR__."/../view/budget/list.php";

    }

    public function budgetAddPage($data)
    {
        session_start();
        if(!empty($data['message'])){
            if($data['message'] == 'sucesso'){
                $message_title = "Sucesso";
                $message = "Cadastro efetuado."; 
            }else if($data['message'] == 'erro'){
                $message_title = "Erro";
                $message = "Cadastro não efetuado."; 
            } 
        }   

        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
         
        
        $hidden_action = $_GET['route'];
        $subtitle = "Cadastrar";
        $button_action = "Adicionar";
        $title = "SysMec - Seu gerenciador de oficina - Cadastrar Orçamento";
        require __DIR__."/../view/budget/form.php";
    }
    
    public function budgetEditPage($data)
    {
        session_start();
        if(!empty($data['message'])){
            if($data['message'] == 'sucesso'){
                $message_title = "Sucesso";
                $message = "Cadastro efetuado."; 
            }else if($data['message'] == 'erro'){
                $message_title = "Erro";
                $message = "Cadastro não efetuado."; 
            } 
        }   
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
         
            
        $budgets = new budgetModel;

        $row = $budget->budgetDetail($data['id']);
         
        $hidden_action = substr($_GET['route'],0,15);
        $subtitle = "Editar";
        $button_action = "Editar";
        $title = "SysMec - Seu gerenciador de oficina - Editar Orçamento";
        require __DIR__."/../view/budget/form.php";
    }

    public function vehicleListPage($request)
    {
        session_start();
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
        
        $vehicles = new vehicleModel;
 
        $datas = $vehicles::all();
   

        
        $title = "SysMec - Seu gerenciador de oficina - Lista de Veículos";
        require __DIR__."/../view/vehicle/list.php";
    }

    public function vehicleAddPage($data)
    {
        session_start();
        
        if(!empty($data['message'])){
            if($data['message'] == 'sucesso'){
                $message_title = "Sucesso";
                $message = "Cadastro efetuado."; 
            }else if($data['message'] == 'erro'){
                $message_title = "Erro";
                $message = "Cadastro não efetuado."; 
            }else if($data['message'] == 'veiculo-cadastrado'){
                $message_title = "Erro";
                $message = "Veículo já cadastrado."; 
            }  
        }   

        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
         
        
        $hidden_action = $_GET['route'];
        $subtitle = "Cadastrar";
        $button_action = "Adicionar";
        $title = "SysMec - Seu gerenciador de oficina - Cadastrar Veículo";
        require __DIR__."/../view/vehicle/form.php";
    }

    public function vehicleEditPage($data)
    {
        session_start();

        if(!empty($data['message'])){
            if($data['message'] == 'sucesso'){
                $message_title = "Sucesso";
                $message = "Cadastro efetuado."; 
            }else if($data['message'] == 'erro'){
                $message_title = "Erro";
                $message = "Cadastro não efetuado."; 
            }else if($data['message'] == 'veiculo-cadastrado'){
                $message_title = "Erro";
                $message = "Veículo já cadastrado."; 
            }  
        }   
        if(empty($_SESSION)){ 
            header("location: ".getenv('APP_HOST')."/sair/usuario-nao-logado");
        }
              
        $vehicles = new vehicleModel;

        $row = $vehicles->vehicleDetail($data['id']);
         
        $hidden_action = substr($_GET['route'],0,15);
        $subtitle = "Editar";
        $button_action = "Editar";
        $title = "SysMec - Seu gerenciador de oficina - Editar Veículo";
        require __DIR__."/../view/vehicle/form.php";
    }

}