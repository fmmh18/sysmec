<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{    
    protected $table = "users";

    public function __construct()
    {
        parent::__construct();
    } 

    public function userDuplicate($cpfcnpj)
    {
        return userModel::where('cpf',$cpfcnpj)->count();
    }

    public function userFindMail($mail)
    {
        return userModel::where('mail','=',$mail)->count();
    }

    public function userFindStatus($mail)
    {
        return userModel::where('status',1)->where('mail',$mail)->count();
    }

    public function userValidate($mail,$password)
    {
        $user =  userModel::where('mail',$mail)
                        ->where('password',$password)
                        ->where('status',1)->first();
        return $user;
    }

    public function userInsert($data)
    {
        $user = new userModel;
        $user->name            = $data['name'];
        $user->mail            = $data['mail'];
        $user->cpfcnpj         = $data['cpfcnpj'];
        $user->password        = $data['password'];
        $user->address         = $data['address'];
        $user->neighborhood    = $data['neighborhood'];
        $user->complement      = $data['complement'];
        $user->zipcode         = $data['zipcode'];
        $user->number          = $data['number'];
        $user->state           = $data['state'];
        $user->city            = $data['city'];
        $user->phone           = $data['phone'];
        $user->image           = $data['image'];
        $user->level           = $data['level'];
        $user->created_at      = date('Y-m-d H:i:s');
        $user->save();
        
        return $user->id;
    }
    
    public function userList()
    {
        return userModel::all();
    }

    public function userDetail($id)
    {
        return userModel::where('id',$id)->first();
    }

    public function userAccess($id){
        return userModel::where('id',$id)->where('access','<',0)->first();
    }

    public function userUpdate($data)
    {
        $user = userModel::where('id','=',$data['user_id'])->update([
            'name'=>$data['user_name'],
            'mail'=>$data['user_mail'],
            'password'=>$data['user_password'],
            'phone'=>$data['user_phone'],
            'cellphone'=>$data['user_cellphone'],
            'zipcode'=>$data['user_zipcode'],
            'address'=>$data['user_address'],
            'number'=>$data['user_number'],
            'neighborhood'=>$data['user_neighborhood'],
            'complement'=>$data['user_complement'],
            'city'=>$data['user_city'],
            'state'=>$data['user_state'],
            'level'=>$data['user_level'],
            'status'=>$data['user_status'],
            'image'=>$data['user_image']
            ]);

    }
}