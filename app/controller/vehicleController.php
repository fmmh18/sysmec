<?php
    
    namespace App\Controller;
    use App\Model\vehicleModel;
    use App\Model\vehicleuserModel;

class vehicleController
{
    public function vehicleEditStatus($request)
    {
        $status = $request['status'];
        $id     = $request['id']; 
        $user   =  vehicleModel::where('id',$id)->update([
            'status'    => $status,
            'updated_at'=> date('Y-m-d H:i:s')]);
        echo $user;
    }

    public function vehicleRegister($request)
    {
        $vehicles = new vehicleModel;
        $result = $vehicles->vehicleDuplicate($request['board']);

        if($result > 0){
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/veiculo-cadastrado");
            return false;
        }
        if(!empty($vehicles->vehicleInsert($request)))
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

    public function vehicleUpdate($request)
    {
        $vehicles   = new vehicleModel;
 
       
        if(!empty($vehicles->vehicleUpdate($request)))
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

    public function listVehicleUser($request)
    {
        $vehicles = new vehicleuserModel;
        $data = $vehicles->listUserVehicle($request);
        $result = json_encode($data[0]);
        echo $result;
    }
}