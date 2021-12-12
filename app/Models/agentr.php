<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class agentr extends Model
{
    //
   
    protected $primaryKey = 'id'; 

    public function restaurant() 
    { 
        return $this->hasMany(restaurant::class); 
      
    }
    public function verifyUser()
{
  return $this->hasOne('App\VerifyUser');
}
}
