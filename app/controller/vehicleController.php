<?php
    
    namespace App\Controller;
    use App\Model\vehicleModel;

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
}