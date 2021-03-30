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
        return userModel::where('mail',$mail)->count();
    }

    public function userFindStatus($mail)
    {
        return userModel::where('status',1)->where('mail',$mail)->count();
    }
    public function userValidateCPFCNPJ($cpfcnpj)
    {
        $user =  userModel::where('cpfcnpj',$cpfcnpj)->count();
        return $user;
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
        $user = userModel::where('id',$data['id'])->update([
            'name'          => $data['name'],
            'mail'          => $data['mail'],
            'password'      => $data['password'],
            'phone'         => $data['phone'], 
            'zipcode'       => $data['zipcode'],
            'address'       => $data['address'],
            'number'        => $data['number'],
            'neighborhood'  => $data['neighborhood'],
            'complement'    => $data['complement'],
            'city'          => $data['city'],
            'state'         => $data['state'],
            'level'         => $data['level']
            ]);
            return $user;

    }
}