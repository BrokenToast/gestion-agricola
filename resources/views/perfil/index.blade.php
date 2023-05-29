@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        <h3>Configuración</h3>
    </div>
    <div class="card-body">
        {!! Form::open() !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
        {!! Form::close() !!}
    </div>
  </div>
@endsection
