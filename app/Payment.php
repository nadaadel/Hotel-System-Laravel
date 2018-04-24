<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'amount', 'currency'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
