<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    protected $table = 'grupos';

    public function movements() {
        return $this->hasMany('App\Movement');
    }

}
