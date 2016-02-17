@extends('layouts.master')

@section('title', 'Ingresos')

@section('content')

<h3>INGRESOS</h3>


<table class="table table-hover">
    <thead>
        <tr><th class="col-md-1">Año</th> <th class="col-md-1">Mes</th> <th>Descripción</th> <th style="text-align: right">Monto</th> </tr>
    </thead>
    <tbody>
        @foreach ($movimientos as $year=>$movs)
        <tr>
            <th rowspan="{{ $movs->count() + $movs->meses->count() + 1 }}">{{ $year }}</th> <th style="text-align: right" colspan="3">TOTAL: ${{ $movs->total }}</th>
            @foreach ($movs->meses as $month=>$movs)
               <tr><td rowspan="{{ $movs->count() + 1 }}">{{ $meses[$month] }}</td><td style="text-align: right" colspan="2">TOTAL: ${{ $movs->total }}</td></tr>
                @foreach ($movs as $mov)
                   <tr><td>{{ $mov->notas }}</td><td style="text-align: right">${{ $mov->monto }}</td></tr>
                @endforeach
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@stop
