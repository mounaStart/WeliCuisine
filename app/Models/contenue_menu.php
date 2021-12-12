<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contenue_menu extends Model
{
    //
    protected $primaryKey = 'Id'; 

    public function getPrice(){
        $price = $this->Prix_Plat   ;
        return number_format($price, 0, ',' , '').' MRU' ;
    }
    public function menu_contenue_menus() 
      { 
          return $this->hasMany(menu_contenue_menu::class); 
        
      }
      
public function photo_plat() 
{ 
    return $this->hasMany(phot_plat::class); 
  
}
}
