<?php
    
    namespace App\Controller;
    use App\Model\budgetModel;
    use App\Model\budgetPartModel;

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

    public function budgetPartEditStatus($request)
    {
        $status = $request['status'];
        $id     = $request['id']; 
        $budget =  budgetPartModel::where('id',$id)->update([
            'status'    => $status,
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        echo $budget;
    }

    public function budgetRegister($request)
    {
        $products = $request['product']; 

        $budgets = new budgetModel;
        $budgetsparts = new budgetPartModel;
        
        if(empty($request) && !($request['hidden_action'])){
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/campo-vazio");
            return false;
        }
        
        $id_vehicle = $request['id_vehicle']; 
        $count = 0; 

        if(!empty($budget_id = $budgets->budgetInsert($request))){
            for($i = 0; $i <= (count($products)-1); $i++):
             $budgetsparts->createBudgetPart($products[$i],$budget_id,$id_vehicle); 
             $count++;
            endfor;
          
            if($count == count($products)){
                if(!empty($request['hidden_action']))
                header("location: ".getenv('APP_HOST').$request['hidden_action']."/sucesso");
                else
                header("location: ".getenv('APP_HOST')."/sucesso");
               return false;
            }else{
                if(!empty($request['hidden_action']))
                header("location: ".getenv('APP_HOST').$request['hidden_action']."/erro");
                else
                header("location: ".getenv('APP_HOST')."/erro");
               return false;
            }
        }
    }

    public function budgetUpdate($request)
    {
       
        $products = $request['product'];
        
        $budgets        = new budgetModel;
        $budgetsparts   = new budgetPartModel;
        
        if(empty($request) && !($request['hidden_action'])){
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/campo-vazio");
            return false;
        }
        
        $id_vehicle = $request['id_vehicle']; 
        $budget_id  = $request['id'];
        $count      = 0;
        $total_products = count($products); 

        if(!empty($budgets->budgetEdit($request))){
            if($total_products > 0):
                for($i = 0; $i <= (count($products)-1); $i++):
                $budgetsparts->createBudgetPart($products[$i],$budget_id,$id_vehicle); 
                $count++;
                endfor;
          
                if($count == count($products)){
                    if(!empty($request['hidden_action']))
                    header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/sucesso");
                    else
                    header("location: ".getenv('APP_HOST')."/".$request['id']."/sucesso");
                return false;
                }else{
                    if(!empty($request['hidden_action']))
                    header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/erro");
                    else
                    header("location: ".getenv('APP_HOST')."/".$request['id']."/erro");
                return false;
                }

            else:
                if(!empty($request['hidden_action']))
                header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/sucesso");
                else
                header("location: ".getenv('APP_HOST')."/".$request['id']."/sucesso");
            endif;
        }else{
            if(!empty($request['hidden_action']))
            header("location: ".getenv('APP_HOST').$request['hidden_action']."/".$request['id']."/erro");
            else
            header("location: ".getenv('APP_HOST')."/".$request['id']."/erro");            
        }
    }
}