@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Editar gasto.
    </div>
    <div class="card-body col-12">
        {!! Form::open(['method'=>'PUT','url'=>route('gasto.update',$gasto->id)]) !!}
        <div>
            {!! Form::label('descripcion','Descripcion', ['class'=>'form-label']) !!}
            {!! Form::textarea('descripcion', old('descripcion')?? $gasto->descripcion, ['placeholder'=>'Observaciones sobre la temporada','rows'=>'4','cols'=>'50']) !!}
            @error('descripcion')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['descripcion'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('cantidad','Cantidad €', ['class'=>'form-label']) !!}
            {!! Form::number('cantidad', old('cantidad')?? $gasto->cantidad, ['class'=>'form-number','step'=>'0.1']) !!}
            @error('cantidad')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['cantidad'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('fecha','Fecha', ['class'=>'form-label']) !!}
            {!! Form::date('fecha', old('fecha')?? $gasto->fecha, ['class'=>'form-input']) !!}
            @error('fecha')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['fecha'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3">
            {!! Form::label('finca_id','Finca', ['class'=>'form-label']) !!}
            {!! Form::select('finca_id', $fincas, old('finca_id')?? $gasto->finca->id, ['class'=>'form-select']) !!}
            @error('finca_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['finca_id'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3">
            {!! Form::label('temporada_id','Temporada', ['class'=>'form-label']) !!}
            {!! Form::select('temporada_id', $temporadas, old('temporada_id')?? $gasto->temporada->id, ['class'=>'form-select']) !!}
            @error('temporada_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['temporada_id'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3">
            {!! Form::label('tipo_de_gasto_id','Tipo de gasto', ['class'=>'form-label']) !!}
            {!! Form::select('tipo_de_gasto_id', $tipo_de_gastos, old('tipo_de_gasto_id')?? $gasto->tipoDeGasto->id, ['class'=>'form-select']) !!}
            @error('tipo_de_gasto_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['tipo_de_gasto_id'][0]}}</strong>
                </span>
            @enderror
        </div>
        </div>
            {!! Form::submit('Editar', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

  </div>
@endsection

