<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name'=>'required',
        'message'=>'required',
        'belongGym'=>'required'
    );

}
