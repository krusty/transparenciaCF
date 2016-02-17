<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model {

    protected $table = 'personas';

    protected $appends = array('egresos');

    public function movimientos() {
        return $this->hasMany('App\Movement', 'person_id');
    }

    public function area() {
        return $this->belongsTo('App\Area', 'area_id');
    }

    public function getEgresosAttribute($value) {
        return $this->movimientos->where('tipo', 'egreso')->sum('monto');
    }
}
