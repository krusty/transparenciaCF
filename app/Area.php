<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

    protected $table = 'areas';

    public function personas() {
        return $this->hasMany('App\People', 'area_id');
    }
}
