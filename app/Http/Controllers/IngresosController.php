<?php

namespace App\Http\Controllers;

use App\Movement;
use App\Http\Controllers\Controller;

class IngresosController extends Controller{

    public function show(){
        $meses = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];
        $movimientos = Movement::all()->where('tipo', 'ingreso')
            ->groupBy(function($item) {
                return date('Y', strtotime($item->fecha));
            })
            ->each(function ($year) {
                $year->total = $year->sum('monto');
                $year->meses = $year->groupBy(function($item) {
                    return date('m', strtotime($item->fecha));
                })->sort()->reverse();
                $year->meses->each(function ($month) {
                    $month->total = $month->sum('monto');
                });
            });

        return view('ingresos', ['tab' => 'ingresos'])
            ->with('movimientos', $movimientos)
            ->with('meses', $meses);
    }
}
