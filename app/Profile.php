<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $table = "profile";
    public $primarykey = 'id';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function research() {
        return $this->hasMany('App\Research');
    }
        public function countresearch() {
        return $this->hasMany('App\Research', 'id', 'user_id');
    }
    public function comment() {
        return $this->hasMany('App\Comment');
    }

    public function School() {
        return $this->hasOne('App\School', 'id', 'school_id' );
    }
     public function rank() {
        return $this->hasOne('App\roles', 'id', 'role' );
    }

}
