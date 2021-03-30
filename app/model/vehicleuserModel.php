<?php
    
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class vehicleuserModel extends Model
{
    protected $table = "vehicles_users";

    public function __construct()
    {
        parent::__construct();
    }
    
    public function listUserVehicle($request)
    {
        return vehicleuserModel::join('vehicles','vehicles_users.id_veiculo','=','vehicles.id')
        ->join('users','vehicles_users.id_usuario','=','users.id')
        ->select('users.id as id_user','users.name as name', 'users.mail as mail','users.phone as phone','users.cpfcnpj as cpfcnpj','vehicles.id as id_vehicle','vehicles.board as board','vehicles.brand as brand', 'vehicles.model as model','vehicles.year as year')
        ->where('vehicles.board',$request['board'])
        ->get();
    }

 }