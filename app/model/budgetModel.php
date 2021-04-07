<?php
    
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class budgetModel extends Model
{
    protected $table = "budgets";

    public function __construct()
    {
        parent::__construct();
    }
    
    public function budgetDetail($id)
    {
        return budgetModel::where('id',$id)->first();   
    }

    public function budgetInsert($data)
    {
        $budget = new budgetModel;
        $budget->id_vehicle    = $data['id_vehicle'];
        //$budget->id_workshop   = $data['id_workshop'];
        $budget->id_workshop   = 1;
        $budget->id_user       = $data['id_user'];
        $budget->date_entry    = date('Y-m-d H:i:s');
        $budget->total         = $data['value_total_services']; 
        $budget->created_at    = date('Y-m-d H:i:s');
        $budget->save();
        
        return $budget->id;
    }

    public function budgetUpdate($data)
    {
        $budget = budgetModel::where('id',$data['id'])->update([
            'board'          => $data['board'],
            'brand'          => $data['brand'],
            'model'          => $data['model'], 
            'year'           => $data['year'], 
            'updated_at'     => date('Y-m-d H:i:s')
            ]);
            return $budget;

    }
 
}