<?php

namespace App;
use App\Room;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'gender' , 'phone' , 'country' , 'avatar' ,
    ];
   
    protected $attributes = [ 'is_registered' => 0];
    
    public function rooms(){
        return $this->belongsToMany(Room::class);
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];
}
