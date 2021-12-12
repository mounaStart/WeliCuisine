<?php

namespace App;

use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Agentr extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'agentr';

        protected $fillable = [
            'Num_Agent','name','Prenom_AgentR','Num_Tel','Sexe', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function restaurants() 
    { 
        return $this->hasMany(restaurant::class); 
      
    }


  
}
