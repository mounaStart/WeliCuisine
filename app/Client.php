<?php


namespace App;

use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Client extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'client';

        protected $fillable = [
            'name','Prenom_Client','Num_Tel','Sexe','ville','pays', 'email', 'password',
        ];
        
        protected $hidden = [
            'password', 'remember_token',
        ];




  
}
