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
        $budget->name            = $data['name'];
        $budget->mail            = $data['mail'];
        $budget->cpfcnpj         = $data['cpfcnpj'];
        $budget->password        = $data['password'];
        $budget->address         = $data['address'];
        $budget->neighborhood    = $data['neighborhood'];
        $budget->complement      = $data['complement'];
        $budget->zipcode         = $data['zipcode'];
        $budget->number          = $data['number'];
        $budget->state           = $data['state'];
        $budget->city            = $data['city'];
        $budget->phone           = $data['phone'];
        $budget->image           = $data['image'];
        $budget->level           = $data['level'];
        $budget->created_at      = date('Y-m-d H:i:s');
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