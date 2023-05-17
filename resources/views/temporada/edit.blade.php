@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Temporada create
    </div>
    <div class="card-body">
        {!! Form::open(['method'=>'PUT','url'=>route('temporada.update',$temporada->id)]) !!}
        <div>
            {!! Form::label('fecha_fin','Fecha de finalizar', ['class'=>'form-label']) !!}
            {!! Form::date('fecha_fin', null, ['class'=>'form-input']) !!}
        </div>
        <div>
            {!! Form::label('observaciones','Observaciones', ['class'=>'form-label']) !!}
            {!! Form::textarea('observaciones', null, ['placeholder'=>'Observaciones sobre la temporada','rows'=>'4','cols'=>'50']) !!}

        </div>
            {!! Form::submit('Finalizar', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

  </div>
@endsection
