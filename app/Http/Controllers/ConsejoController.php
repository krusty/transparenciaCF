<?php

namespace App\Http\Controllers;

use DB;
use App\Area;
use App\People;
use App\Movement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsejoController extends Controller{

    public function show(Request $request){

        debug($request->session());
        $areas = Area::with(['personas' => function ($q) {
            $q->where('destacado', 0);
        }])->get();
        $destacados = People::where('destacado', 1)->get();

        return view('consejo', ['tab' => 'consejo'])
            ->with('areas', $areas)
            ->with('destacados', $destacados);
    }

    public function cargaGasto(Request $request){
        debug($request->session()->get('user'));
        if (!$request->session()->get('user')) {
            return redirect('/auth/google');
        }

        $form = \DataEdit::source(new Movement());

        $form->add('fecha','Fecha','date')->rule('required')
            ->format('d/m/Y', 'es');
        $form->add('tipo','Tipo','radiogroup')->rule('required')
            ->option('ingreso', 'Ingreso')
            ->option('egreso', 'Egreso')
            ->insertValue('egreso');
        $form->add('category_id','Categoría','select')->rule('required')
            ->options(\App\Category::lists('nombre', 'id')->all());
        $form->add('person_id','Persona','select')->rule('required')
            ->options(\App\People::lists('nombre', 'id')->all());
        $form->add('group_id','Grupo','select')->rule('required')
            ->options(\App\Group::lists('nombre', 'id')->all());
        $form->add('monto', 'Monto ($)', 'text')->rule('required');
        $form->add('comprobante', 'Comprobante', 'file')->move('media/comprobantes/');
        $form->add('notas', 'Notas', 'textarea')->rule('required');

        $form->saved(function() use ($form)
        {
            $form->message("Gasto guardado");
            $form->link("/cargar", "Ingresar otro");
        });

        return $form->view('gasto', compact('form'))->with('tab', 'gastos');
    }

}
