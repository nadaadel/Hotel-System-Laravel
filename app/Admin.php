<?php

namespace App;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class Admin extends Authenticatable implements BannableContract
{
    use Notifiable;
    use HasRoles;

    use Bannable;



    protected $guard_name = 'admin';

    protected $guard = 'admin' ;
    protected $fillable=['name','password','national_id','email','avatar','created_by'];


    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
