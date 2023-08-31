<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fake extends Model
{
    use HasFactory;
}

//{{$item->name}}{{$item->age}}{{$item->gender}}{{$item->protein}}{{$item->mustle}}{{$item->PR}}
//$param=['name' => $data['name'],];
//DB::insert('insert into fakes (name) values (:name)', $param);