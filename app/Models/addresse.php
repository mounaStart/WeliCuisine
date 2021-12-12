<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addresse extends Model
{
    //
    protected $primaryKey = 'Id'; 

             
public function restaurants()
{  
    return $this->belongsTo(restaurant::class,'Id_Restau');  
}
}
