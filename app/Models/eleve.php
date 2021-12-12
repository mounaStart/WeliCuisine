<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eleve extends Model
{
    //

    protected $primaryKey = 'Id_Eleve'; 

    public function classe()
{ 
    return $this->belongsTo(classe::class,'Id_Classe'); 
}
public function parents()
{ 
    
    return $this->belongsTo(parentEleve::class,'Id_Parent');  
}

public function suivres() 
{ 
    return $this->hasMany(suivre::class); 
}
}
