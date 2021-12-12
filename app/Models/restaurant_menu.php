<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restaurant_menu extends Model
{
    //
      //
       protected $primaryKey = 'Id'; 

                
public function menus()
{
    return $this->belongsTo(menu::class,'Id_Menu');  
}
          
public function restaurants()
{ 
    
    return $this->belongsTo(restaurant::class,'Id_Restaurant');  
}

}