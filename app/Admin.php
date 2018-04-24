<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $fillable = [
        'name', 'email', 'password' , 'national_id' , 'avatar' ,'is_ban' ,
    ];
    protected $guard_name = 'admin';

    protected $guard = 'admin' ;



    protected $hidden = [
        'password', 'remember_token',
    ];
}
