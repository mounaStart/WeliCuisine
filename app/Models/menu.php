<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
      //
      protected $primaryKey = 'Id'; 

      public function menu_contenue_menus() 
      { 
          return $this->hasMany(menu_contenue_menu::class); 
        
      }
    
      public function restaurant_menu() 
    { 
        return $this->hasMany(restaurant_menu::class); 
      
    }

}