@extends('layouts.master')

@section('title', 'Consejo Municipal')

@section('content')

<h3>CONSEJALES</h3>
    <div class="row">
      @foreach ($destacados as $destacado)
      <div class="col-md-4">
        <div class="thumbnail">
          <img src="/media/fotos/{{ $destacado->foto }}" alt="{{ $destacado->nombre }}">
          <div class="caption">
            <h3>{{ $destacado->nombre }}</h3>
            <dl class="dl-horizontal">
              <dt>Sueldo</dt>
              <dd>${{ $destacado->sueldo }}</dd>
              <dt>Donación</dt>
              <dd>${{ $destacado->aporte }}</dd>
            </dl>
          </div>
        </div>
      </div>
      @endforeach
    </div>
<h3>EQUIPO</h3>
<table class="table table-hover table-responsive">
    <thead>
        <tr><th>Area</th> <th>Nombre</th> <th>Sueldo</th> <th>Donación</th> </tr>
    </thead>
    <tbody>
        @foreach ($areas as $area)
        @if (count($area->personas))
        <tr>
            <th rowspan="{{ count($area->personas) }}">{{ $area->nombre }}</th>
            <td>{{ $area->personas->first()->nombre }}</td> <td>${{ $area->personas->first()->sueldo }}</td> <td>${{ $area->personas->first()->aporte }}</td>
        </tr>
            @foreach ($area->personas->splice(1) as $persona)
            <tr><td>{{ $persona->nombre }}</td> <td>${{ $persona->sueldo }}</td> <td>${{ $persona->aporte }}</td></tr>
            @endforeach
        @endif
        @endforeach
    </tbody>
</table>
@stop
