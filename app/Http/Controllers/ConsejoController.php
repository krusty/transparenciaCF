<?php

namespace App\Http\Controllers;

use DB;
use App\Area;
use App\People;
use App\Http\Controllers\Controller;

class ConsejoController extends Controller{

    public function show(){
        $areas = Area::with(['personas' => function ($q) {
            $q->where('destacado', 0);
        }])->get();
        $destacados = People::where('destacado', 1)->get();


        return view('consejo', ['tab' => 'consejo'])
            ->with('areas', $areas)
            ->with('destacados', $destacados);
    }
}
