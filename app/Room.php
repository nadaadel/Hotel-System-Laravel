<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'capacity', 'price', 'number','admin_id','floor_id',
    ];
    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function Admin(){
        return $this->belongsTo(Admin::class);
    }
    
}
