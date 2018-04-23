<?php

namespace App;
use App\Role;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    protected $fillable = [
        'name', 'number','created_by'
    ];

    public function Role(){
        return $this->belongsTo(Role::class);
    }
}
