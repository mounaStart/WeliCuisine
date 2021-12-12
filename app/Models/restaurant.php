<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    //
      //
      protected $primaryKey = 'Id_Restau'; 

           
public function agentrs()
{  
    return $this->belongsTo(agentr::class,'Id_AgentR');  
}
public function restaurant_menu() 
    { 
        return $this->hasMany(restaurant_menu::class); 
      
    }
    
    public function addresses() 
    { 
        return $this->hasMany(addresse::class); 
      
    }

}
