<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';
    
    function profile() {
        return $this->belongsTo('App\Profile', 'user_id', 'user_id');
    }
}
