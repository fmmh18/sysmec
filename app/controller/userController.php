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

        if($users->userFindMail($mail) == 1 && $users->userFindStatus($mail) == 1)
        {
            if(!empty($user = $users->userValidate($mail,$password)))
            {
                session_start();

                $_SESSION['uID']        = $user['id'];
                $_SESSION['uLevel']     = $user['level'];
                $_SESSION['uName']      = $user['name'];
                $_SESSION['uMail']      = $user['mail'];
                $_SESSION['uIDSession'] = md5($user['id'])."-".date("Y-m-d H:i:s");
                
                header("location: ".getenv('APP_HOST')."/principal");
                return false;
            }else{
                header("location: ".getenv('APP_HOST')."/usuario-nao-encontrado");
                return false;
            }
        }else{ 
            header("location: ".getenv('APP_HOST')."/usuario-nao-encontrado");
            return false;
        }
    }

    public function userRegister($request)
    {
        
        $users   = new userModel;

        //verificar se ja possui cadastro
        $result = $users->userValidateCPFCNPJ($request['cpfcnpj']);
        if(empty($request) && !($request['hidden_action'])){
            if(!empty($request['hidden_action'])):
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/campo-vazio");
            return false;
            else:
            header("location: ".getenv('APP_HOST')."/campo-vazio");
            return false;
            endif;
     
        }

        if($result > 0){
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/sucesso");
            else
            header("location: ".getenv('APP_HOST')."/sucesso");
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
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/sucesso");
            else
            header("location: ".getenv('APP_HOST')."/sucesso");
        }else{
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/erro");
            else
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/erro");
        }

    }

    public function userLogout($request)
    {
        session_start();
        session_destroy();
        unset($_SESSION);  
        if(!empty($request))
        {
            header("location: ".getenv('APP_HOST')."/".$request['message']);
        }else{
            header("location: ".getenv('APP_HOST'));
        }
        
        
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

    public function userEditStatus($request)
    {
        $status = $request['status'];
        $id     = $request['id']; 
        $user   =  userModel::where('id',$id)->update([
            'status'    => $status,
            'updated_at'=> date('Y-m-d H:i:s')]);
        echo $user;
    }

    public function userUpdate($request)
    {
        $users   = new userModel;
 
        
        //gerar senha aleatória
        $password = $request['password'];
        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
        $hash = crypt($password, '$2a$' . $custo . '$' . $salt . '$');
        $request['password'] = $hash;
         
        if(!empty($users->userUpdate($request)))
        {
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/sucesso");
            else
            header("location: ".getenv('APP_HOST')."/".$request['id']."/sucesso");
        }else{
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/erro");
            else
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/erro");
        }
    }
}