@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Temporada create
    </div>
    <div class="card-body">
        {!! Form::open(['method'=>'POST','url'=>route('temporada.store')]) !!}
        <div>
            {!! Form::label('fecha_inicio','Fecha de inicio', ['class'=>'form-label']) !!}
            {!! Form::date('fecha_inicio', null, ['class'=>'form-input']) !!}
        </div>
            {!! Form::submit('Crear', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

  </div>
@endsection
