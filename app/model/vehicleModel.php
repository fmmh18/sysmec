<?php
    
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class vehicleModel extends Model
{
    protected $table = "vehicles";

    public function __construct()
    {
        parent::__construct();
    }

    public function vehicleDetail($id)
    {
        return vehicleModel::where('id',$id)->first();   
    }

 }