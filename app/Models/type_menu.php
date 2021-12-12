<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class type_menu extends Model
{
    //
      //
      protected $primaryKey = 'Id'; 
      public function type_menu_menu() 
      { 
          return $this->hasMany(menu_type_menu::class); 
      }
      
}
