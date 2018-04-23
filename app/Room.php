<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'capacity', 'price', 'number',
    ];
    public function floor(){
        return $this->belongsTo(Floor::class);
    }
    
}
