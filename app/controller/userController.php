<?php
    
    namespace App\Controller;

    use Illuminate\Http\Request;
    use App\Model\userModel;
    use App\Model\clientModel;

class userController
{
    public function userAuthenticate($request)
    {
        $users = new userModel;


        $mail = $request['mail'];

        $password = $request['password'];
        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
        $hash = crypt($password, '$2a$' . $custo . '$' . $salt . '$');
        $password = $hash;

        if($users->userFindMail($mail) == 1 && $users->userFindStatus($mail))
        {
            if(!empty($user = $users->userValidate($mail,$password)))
            {
                session_start();

                $_SESSION['uID'] = $user['id'];
                $_SESSION['uLevel'] = $user['level'];
                $_SESSION['uName'] = $user['name'];
                $_SESSION['uMail'] = $user['mail'];
                $_SESSION['uIDSession'] = md5($user['id'])."-".date("Y-m-d H:i:s");
                
                header("location: ".getenv('APP_HOST')."/principal");
                return false;
            }else{
                header("location: ".getenv('APP_HOST')."/usuario-nao-encontrado");
                return false;
            }
        }else{ header("location: ".getenv('APP_HOST')."/usuario-nao-encontrado");
            return false;
        }
    }

    public function userRegister($request)
    {
        
        $users   = new userModel;

        //verificar se ja possui cadastro
        $result = $users->userValidate($request['cpfcnpj']);

        if($result > 0){
            header("location: ".getenv('APP_HOST')."/erro-cpf-cnpj");
            return false;
        }
        
        //gerar senha aleatória
        $password = $request['password'];
        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
        $hash = crypt($password, '$2a$' . $custo . '$' . $salt . '$');
        $request['password'] = $hash;
         
        if(!empty($users->userInsert($request)))
        {
            header("location: ".getenv('APP_HOST')."/sucesso");
        }else
        {
            header("location: ".getenv('APP_HOST')."/erro");
        }

    }

    public function userLogout()
    {
        session_start();
        session_destroy();
        unset($_SESSION);
        header("location: ".getenv('APP_HOST')."/");
        
    }

    public function userList()
    {
        session_start();
        
        $users   = new userModel; 
        if($_SESSION['uLevel'] != 1)
        {
            header("location: ".getenv('APP_HOST')."/permissao");
        }else{
            $datas = $users->userList(); 
            
            $title = "XôMenu - Seu webcardárpio";
             require __DIR__."/../view/admin/user/list.php";

        }
    }
    public function userCreate($request)
    {
        session_start();

        if(!empty($request['message']))
        {
            if($request['message'] == 'sucesso')
            {
                $status['message'] = 'sucesso' ;
                $message = "Usuário criado.";
            }
            else if($request['message'] == 'erro')
            {
                $status['message'] = 'erro' ;
                $message = "Opss! aconteceu algo que não previamos.";
            }
        }
 
        if($_SESSION['uLevel'] != 1)
        {
            header("location: ".getenv('APP_HOST')."/permissao");
        }else{
            $title = "XôMenu - Seu webcardárpio";
            require __DIR__."/../view/admin/user/add.php";
        }
    }

    public function userEdit($request)
    {
        session_start();
        
        $id = $request['id'];

        if(!empty($request['message']))
        {
            if($request['message'] == 'sucesso')
            {
                $status['message'] = 'sucesso' ;
                $message = "Usuário alterado.";
            }
            else if($request['message'] == 'erro')
            {
                $status['message'] = 'erro' ;
                $message = "Opss! aconteceu algo que não previamos.";
            }
        }

        $users = new userModel;

        $user = $users->userDetail($id);

        $title = "XôMenu - Seu webcardárpio";
        require __DIR__."/../view/admin/user/edit.php"; 
    }

    public function userUpdate($request)
    {
        session_start();
 
        $id = $request['user_id'];
        $users = new userModel;

        if($request['user_level'] == 2){
            $url = getenv('APP_UPLOADLOGO');
        }else{
            $url = getenv('APP_UPLOADIMAGE');
        }


        $image_old = $request['user_image_old'];
        $image_new = $_FILES['user_image']['name'];

        if($image_old != $image_new){ 

            $images = $_FILES;  

            if($images['user_image']['error'] == 0)
            {
                if(move_uploaded_file($images["user_image"]["tmp_name"], $url.$images["user_image"]["name"]))
                {
                    $request['user_image'] = $images["user_image"]["name"];
                    return $users->userUpdate($request);
                    
                    header("location: ".getenv('APP_HOST')."/usuario/editar/".$id."/sucesso");
                }
            }
        }else{
            $request['user_image'] = $image_old;

            return $users->userUpdate($request);
            
            header("location: ".getenv('APP_HOST')."/usuario/editar/".$id."/sucesso");
        }
    }
}