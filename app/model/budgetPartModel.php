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
     
 
}