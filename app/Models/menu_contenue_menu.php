<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_contenue_menu extends Model
{
    //
    protected $primaryKey = 'id'; 

                 
public function menus()
{ 
    
    return $this->belongsTo(menu::class,'id_Menu');  
}
             
public function contenuemenus()
{ 
    
    return $this->belongsTo(contenue_menu::class,'id_contenue_menu');  
}
}
