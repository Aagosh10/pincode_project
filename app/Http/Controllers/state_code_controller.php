<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StateCodeModel;

class state_code_controller extends Controller
{
    //
    public function save_state_code()
    {
        $states=array("ANDAMAN & NICOBAR ISLANDS",
            "ANDHRA PRADESH","ARUNACHAL PRADESH",
            "ASSAM","BIHAR","CHANDIGARH","CHATTISGARH",
            "DADRA AND NAGAR HAVELI","DAMAN AND DIU","DELHI","GOA",
            "GUJARAT","HARYANA","HIMACHAL PRADESH","JAMMU & KASHMIR",
            "JHARKHAND","KARNATAKA","KERALA","LAKSHADWEEP","MADHYA PRADESH",
            "MAHARASTHRA","MANIPUR","MEGHALAYA","MIZORAM","NAGALAND","ODISHA",
            "PONDICHERRY","PUNJAB","RAJASTHAN","SIKKIM","TAMIL NADU","TELANGANA",
            "TRIPURA","UTTAR PRADESH","UTTARAKHAND","WEST BENGAL");
        $statecodes=array("AN","AP","AR","AS","BR","CH","CG","DN","DD","DL",
            "GA","GJ","HR","HP","JK","JH","KA","KL",
            "LD","MP","MH","MN","ML","MZ","NL",
            "OR","PY","PB","RJ","SK","TN","TS","TR","UP",
            "UK","WB");
        for($x=0;$x<36;$x++) {
            $stateCodeModel = new StateCodeModel;
            $stateCodeModel->statecode = $statecodes[$x];
            $stateCodeModel->statename = $states[$x];
            $stateCodeModel->save();
        }
        return response()->json("done");

    }
}
