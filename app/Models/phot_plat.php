<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phot_plat extends Model
{
    //
    protected $primaryKey = 'Id'; 
             
public function plats()
{ 
    
    return $this->belongsTo(contenue_menu::class,'Id_Contenue');  
}
}

