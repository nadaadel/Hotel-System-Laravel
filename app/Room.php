<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'capacity', 'price', 'number','created_by','floor_id'
    ];
    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'created_by');
    }

    
}
