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
        $vehicleusers = new vehicleuserModel;

        if(empty($request) && !($request['hidden_action'])){
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/campo-vazio");
            return false;
     
        }
        
        $result = $vehicles->vehicleDuplicate($request['board']);

        if($result > 0){
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/veiculo-cadastrado");
            return false;
        }
         
        if(!empty($vehicle_id = $vehicles->vehicleInsert($request)))
        {
            $data = array();
            $data = ["user_id"=>$request["user_id"],"id_vehicle"=>$vehicle_id];
             if(!empty($vehicleusers->createVehicleUser($data))){
                if(!empty($request['hidden_action']))
                header("location: ".getenv('APP_HOST').$request['hidden_action']."/sucesso");
                else
                header("location: ".getenv('APP_HOST')."/sucesso");
            }else{
                if(!empty($request['hidden_action']))
                header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/erro");
                else 
                header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/erro");                
            }
        }else{
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/erro");
            else
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/erro");
        }

    }

    public function vehicleUpdate($request)
    {
        $vehicles       = new vehicleModel;
        $vehiclesusers   = new vehicleuserModel;

        if(!empty($vehicles->vehicleUpdate($request)))
        {
            if(!empty($vehiclesusers->updateVehicleUser($request))){
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
        //echo $data;exit;
         if($data)
        {
            $result = json_encode($data[0]);
        }else{
            $result = '{"erro" : true}';
        }
       // echo json_encode($erro);
       // $result = json_encode($data[0]);
        echo $result;
    }
}