<?php
    
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class vehicleModel extends Model
{
    protected $table = "vehicles";
    protected  $fillable = ['board','brand','model','year'];

    public function __construct()
    {
        parent::__construct();
    }

    public function vehicleDetail($id)
    {
        return vehicleModel::where('id',$id)->first();   
    }

    public function vehicleInsert($data)
    { 
        $vehicle = new vehicleModel;
        $vehicle->board       = str_replace('-','',strtoupper($data['board']));
        $vehicle->model       = $data['model'];
        $vehicle->brand       = $data['brand'];
        $vehicle->year        = $data['year'];
        $vehicle->created_at  = date('Y-m-d H:i:s');
        $vehicle->save();
        
        return $vehicle->id;
    }

    public function vehicleDuplicate($board)
    {
        return vehicleModel::where('board',$board)->count();
    }

    public function vehicleUpdate($data)
    {
        $vehicle = vehicleModel::where('id',$data['id'])->update([
            'board'          => str_replace('-','',strtoupper($data['board'])),
            'brand'          => $data['brand'],
            'model'          => $data['model'], 
            'year'           => $data['year'], 
            'updated_at'     => date('Y-m-d H:i:s')
            ]);
            return $vehicle;
    }

 }