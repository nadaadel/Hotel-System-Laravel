<?php

namespace App;
use App\Admin;
use App\Room;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    protected $fillable = [
        'name', 'number','admin_id'
    ];

    public function Admin(){
        return $this->belongsTo(Admin::class);
    }

}
