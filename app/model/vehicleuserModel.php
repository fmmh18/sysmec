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
        $resultado = vehicleuserModel::join('vehicles', 'vehicles_users.id_vehicle', '=', 'vehicles.id')
        ->join('users', 'vehicles_users.id_user', '=', 'users.id')
        ->select('users.id as id_user', 'users.name as name', 'users.mail as mail', 'users.phone as phone', 'users.cpfcnpj as cpfcnpj', 'vehicles.id as id_vehicle', 'vehicles.board as board', 'vehicles.brand as brand', 'vehicles.model as model', 'vehicles.year as year')
        ->where('vehicles.board', $request['board'])
        ->count();

        if ($resultado >= 1) {
            return vehicleuserModel::join('vehicles', 'vehicles_users.id_vehicle', '=', 'vehicles.id')
            ->join('users', 'vehicles_users.id_user', '=', 'users.id')
            ->select('users.id as id_user', 'users.name as name', 'users.mail as mail', 'users.phone as phone', 'users.cpfcnpj as cpfcnpj', 'vehicles.id as id_vehicle', 'vehicles.board as board', 'vehicles.brand as brand', 'vehicles.model as model', 'vehicles.year as year')
            ->where('vehicles.board', $request['board'])
            ->get();
        } else {
            return $resultado;
        }
    }

    public function createVehicleUser($request)
    { 
            $data = new vehicleuserModel;
            $data->id_vehicle      = $request['id_vehicle'];
            $data->id_user         = $request['user_id'];
            $data->status          = 1; 
            $data->created_at      = date('Y-m-d H:i:s');
            $data->save();
            
            return $data->id;
    }
    
    public function updateVehicleUser($request)
    {
            $data = vehicleuserModel::where('id',$request['id_relationship'])->update([
            'id_vehicle'     => $request['id'],
            'id_user'        => $request['user_id'],
            'updated_at'     => date('Y-m-d H:i:s')
            ]);
            return $data;
    }

 }