<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class MovementController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(\App\Movement::with('person', 'category', 'group'));
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('fecha', 'Fecha', 'date');
        $this->grid->add('tipo', 'Tipo');
        $this->grid->add('monto', 'Monto');
        $this->grid->add('{{ $category->nombre }}','Categoría', 'category_id');
        $this->grid->add('{{ $person->nombre }}','Persona', 'person_id');
        $this->grid->add('{{ $group->nombre }}','Grupo', 'group_id');
        $this->addStylesToGrid();

        return $this->returnView();
    }

    public function  edit($entity){

        parent::edit($entity);

        $this->edit = \DataEdit::source(new \App\Movement());
        $this->edit->label('Movimeiento');

        $this->edit->add('fecha','Fecha','date')->rule('required')
            ->format('d/m/Y', 'es');
        $this->edit->add('tipo','Tipo','radiogroup')->rule('required')
            ->option('ingreso', 'Ingreso')
            ->option('egreso', 'Egreso')
            ->insertValue('egreso');
        $this->edit->add('category_id','Categoría','select')->rule('required')
            ->options(\App\Category::lists('nombre', 'id')->all());
        $this->edit->add('person_id','Persona','select')->rule('required')
            ->options(\App\People::lists('nombre', 'id')->all());
        $this->edit->add('group_id','Grupo','select')->rule('required')
            ->options(\App\Group::lists('nombre', 'id')->all());
        $this->edit->add('monto', 'Monto ($)', 'text')->rule('required');
        $this->edit->add('comprobante', 'Comprobante', 'file')->move('media/comprobantes/');
        $this->edit->add('notas', 'Notas', 'textarea')->rule('required');

        return $this->returnEditView();
    }
}
