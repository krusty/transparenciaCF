<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class GroupController extends CrudController{

    public function all($entity){
        parent::all($entity);

        $this->filter = \DataFilter::source(new \App\Group);
        $this->filter->add('nombre', 'Nombre', 'text');
        $this->filter->submit('Buscar');
        $this->filter->reset('Limpiar');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('nombre', 'Nombre');
        $this->addStylesToGrid();

        return $this->returnView();
    }

    public function  edit($entity){

        parent::edit($entity);

        $this->edit = \DataEdit::source(new \App\Group());
        $this->edit->label('Grupo');
        $this->edit->add('nombre', 'Nombre', 'text')->rule('required');

        return $this->returnEditView();
    }
}
