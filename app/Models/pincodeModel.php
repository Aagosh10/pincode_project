<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StateCodeModel;


class pincodeModel extends Model
{
    //
    protected $table='pincode';
    public $timestamps=false;
    public $incrementing=false;

    public function getLocation($code)
    {
        $location= $this->where(config('constants.pincode'),$code)
                        ->first();
        if($location==NULL)
        {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

       $gg = collect($location);

         $statecodee=$location->statecode;
       // return response()->json($statecodee->statecode);
        $gg->put(config('constants.statecode'),$statecodee->statecode);

        return response()->json($gg);


    }
    public function statecode()
    {
        return $this->belongsTo(StateCodeModel::class,'statename');
    }
    public function getPincode($districtname,$statename)
    {
        if($districtname!=NULL&&$statename!=NULL)
        $location=$this->where(config('constants.districtname'),$districtname)
                        ->where(config('constants.statename'),$statename)
                        ->get();
        elseif($districtname==NULL&&$statename!=NULL)
        {
            $location=$this->where(config('constants.statename'),$statename)->get();
        }
        else if($districtname!=NULL&&$statename==NULL)
        {
            $location=$this->where(config('constants.districtname'),$districtname)->get();
        }
        else
        {
            $location=NULL;
        }

        if($location==NULL||!count($location))
        {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
           $gg = collect($location);
        return response()->json($gg);

    }
}
