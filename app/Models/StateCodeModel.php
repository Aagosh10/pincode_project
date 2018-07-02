<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateCodeModel extends Model
{
    //
    protected $table='state_code';
    protected $primaryKey='statename';
    public $keyType='string';
    public $timestamps=false;
    public $incrementing=false;



}
