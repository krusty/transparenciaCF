<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categorias';

    public function movements() {
        return $this->hasMany('App\Movement');
    }

}
