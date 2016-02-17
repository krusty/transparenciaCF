<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class PeopleController extends CrudController{

    public function all($entity){
        parent::all($entity);


        $this->filter = \DataFilter::source(new \App\People);
        $this->filter->add('name', 'Nombre', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('nombre', 'Nombre');
        $this->grid->add('{{ $area->nombre }}','Area', 'area_id');
        $this->grid->add('sueldo', 'Sueldo');
        $this->grid->add('aporte', 'Aporte');
        $this->grid->add('egresos', 'Gastos');
        $this->addStylesToGrid();


        return $this->returnView();
    }

    public function edit($entity){

        parent::edit($entity);

        $this->edit = \DataEdit::source(new \App\People());
        $this->edit->label('Persona');
        $this->edit->text('nombre', 'Nombre')->rule('required');
        $this->edit->add('area_id','Area','select')->rule('required')
            ->options(\App\Area::lists('nombre', 'id')->all());
        $this->edit->checkbox('destacado', 'Destacado');
        $this->edit->text('sueldo', 'Sueldo ($)')->rule('required');
        $this->edit->text('aporte', 'Aporte ($)')->rule('required');
        $this->edit->add('foto', 'Foto', 'image')->move('media/fotos/')->preview(80,80);

        return $this->returnEditView();
    }
}
