<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model {

    protected $table = 'movimientos';

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function group() {
        return $this->belongsTo('App\Group', 'group_id');
    }

    public function person() {
        return $this->belongsTo('App\People', 'person_id');
    }

}
