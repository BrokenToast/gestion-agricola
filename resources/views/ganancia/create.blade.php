@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Create una ganancia.
    </div>
    <div class="card-body col-12">
        {!! Form::open(['method'=>'POST','url'=>route('ganancia.store')]) !!}
        <div>
            {!! Form::label('comprador','Comprador', ['class'=>'form-label']) !!}
            {!! Form::text('comprador', old('comprador'), ['class'=>'form-text']) !!}
            @error('comprador')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['comprador'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('precio_tonelada','Precio tonelada', ['class'=>'form-label']) !!}
            {!! Form::number('precio_tonelada', old('precio_tonelada'), ['class'=>'form-number','step'=>'0.1']) !!}
            @error('precio_tonelada')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['precio_tonelada'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('cantidad','Cantidad(Toneladas)', ['class'=>'form-label']) !!}
            {!! Form::number('cantidad', old('cantidad'), ['class'=>'form-number','step'=>'0.1']) !!}
            @error('cantidad')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['cantidad'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('fecha','Fecha', ['class'=>'form-label']) !!}
            {!! Form::date('fecha', old('fecha'), ['class'=>'form-input']) !!}
            @error('fecha')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['fecha'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3">
            {!! Form::label('finca_id','Finca', ['class'=>'form-label']) !!}
            {!! Form::select('finca_id', $fincas, old('finca_id'), ['class'=>'form-select']) !!}
            @error('finca_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['finca_id'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3">
            {!! Form::label('temporada_id','Temporada', ['class'=>'form-label']) !!}
            {!! Form::select('temporada_id', $temporadas, old('temporada_id'), ['class'=>'form-select']) !!}
            @error('temporada_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['temporada_id'][0]}}</strong>
                </span>
            @enderror
        </div>
        </div>
            {!! Form::submit('Crear', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

  </div>
@endsection
