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
 
}