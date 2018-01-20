<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model {

    protected $table = "research";

    public function profile() {
        return $this->belongsTo('App\Profile', 'user_id', 'user_id');
    }

    public function research_has_category() {
        return $this->hasMany('App\Research_has_category', 'id', 'research_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'research_id', 'id');
    }

}
