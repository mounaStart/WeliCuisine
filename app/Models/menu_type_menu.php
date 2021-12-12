<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_type_menu extends Model
{
    //
    protected $primaryKey = 'Id'; 

             
public function menus()
{ 
    
    return $this->belongsTo(menu::class,'Id_Menu');  
}
             
public function typemenus()
{ 
    
    return $this->belongsTo(type_menu::class,'Id_Type_Menu');  
}
}
