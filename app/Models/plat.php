<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plat extends Model
{
    //
    protected $primaryKey = 'Id'; 
    
    public function getPrice(){
        $price = $this->Prix_Plat / 100 ;
        return number_format($price, 2 , ',' , '').' $' ;
    }
public function type_menu()
{ 
    
    return $this->belongsTo(type_menu::class,'Id_type_menu');  
}
public function photo_plat() 
{ 
    return $this->hasMany(phot_plat::class); 
  
}

}
