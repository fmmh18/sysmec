<?php
    
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class budgetPartModel extends Model
{
    protected $table = "budgets_parts";

    public function __construct()
    {
        parent::__construct();
    }
     
    public function createBudgetPart($request,$budget_id,$id_vehicle)
    {
        $budgetpart = new budgetPartModel;
        $budgetpart->id_budget              = $budget_id;
        $budgetpart->id_vehicle             = $id_vehicle;
        $budgetpart->parts                  = $request['parts'];
        $budgetpart->amount                 = $request['amount'];
        $budgetpart->value_unitary          = $request['value_unitary']; 
        $budgetpart->value_total_pieces     = $request['value_total_pieces']; 
        $budgetpart->status                 = 1;
        $budgetpart->created_at             = date('Y-m-d H:i:s');
        $budgetpart->save();
        
        return $budgetpart->id;
    }
 
}