<?php
    
    namespace App\Controller;
    use App\Model\budgetModel;

class budgetController
{
    public function budgetEditStatus($request)
    {
        $status = $request['status'];
        $id     = $request['id']; 
        $budget =  budgetModel::where('id',$id)->update([
            'status'    => $status,
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        echo $budget;
    }
}