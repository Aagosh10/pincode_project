<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
//use App\pincodeModel;
use Illuminate\Support\Facades\DB;
use App\Models\pincodeModel;

use Illuminate\Support\Facades\Validator;



class PincodeController extends Controller
{
    public function getLocation($pincode = NULL)
    {

        if ($pincode == NULL) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        $pincodemodel = new pincodeModel;
        return $pincodemodel->getLocation($pincode);

    }

    public function getPincode(Request $request)
    {
        if ($request->has(config('constants.districtname')) && $request->has(config('constants.statename'))) {
            $districtname = $request->input(config('constants.districtname'));
            $statename = $request->input(config('constants.statename'));
            $pincodemodel = new pincodeModel;
            return $pincodemodel->getPincode($districtname, $statename);

        }

    }
}
