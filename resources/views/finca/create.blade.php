@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Finca create
    </div>
    <div class="card-body">
        {!! Form::open(['method'=>'POST','url'=>route('finca.store')]) !!}
        <div>
            {!! Form::label('parcela','Numero de parcela', ['class'=>'form-label']) !!}
            {!! Form::number('parcela', old('parcela'), ['class'=>'form-number']) !!}
            @error('parcela')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['parcela'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('poligono','Numero de poligono', ['class'=>'form-label']) !!}
            {!! Form::number('poligono', old('poligono'), ['class'=>'form-number']) !!}
            @error('poligo')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['poligo'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('municipio','Localidad', ['class'=>'form-label']) !!}
            {!! Form::text('municipio', old('municipio'), ['class'=>'form-text']) !!}
            @error('municipio')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['municipio'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('provincia','Provincia', ['class'=>'form-label']) !!}
            {!! Form::text('provincia', old('provincia'), ['class'=>'form-text']) !!}
            @error('provincia')
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->messages()['provincia'][0]}}</strong>
                </span>
            @enderror
        </div>
        <div>
            {!! Form::label('hectarias','Hectarias', ['class'=>'form-label']) !!}
            {!! Form::number('hectarias', old('hectarias'), ['class'=>'form-number','step'=>'0.1']) !!}
            @error('hectarias')
            <span class="text-danger" role="alert">
                <strong>{{ $errors->messages()['hectarias'][0]}}</strong>
            </span>
        @enderror
        </div>
            {!! Form::submit('Crear', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

  </div>
@endsection
