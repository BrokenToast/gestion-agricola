@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Finca
    </div>
    <div class="card-body">
        <div>
            {!! Form::open(['method'=>'get','class'=>'d-flex align-items-center']) !!}
                {!! Form::select('campo',['0'=>'Campos','parcela'=>'Parcela','poligono'=>'Poligono','localidad'=>'Localidad','provincia'=>'Provincia'], 0, ['class'=>'form-select w-25 m-2']) !!}
                {!! Form::text('busqueda', null, ['class'=>'form-text m-2','placeholder'=>'Buscar por campo']) !!}
                {!! Form::checkbox('baja', 1, null, ['id'=>'baja m-2']) !!}
                {!! Form::label('baja', 'Baja', ['class'=>'form-label']) !!}
                {!! Form::submit('Buscar', ['class'=>'btn btn-primary m-2']) !!}
            {!! Form::close() !!}
        </div>
        <hr>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Parcela</th>
                <th scope="col">Poligono</th>
                <th scope="col">Localidad</th>
                <th scope="col">Provincia</th>
                <th scope="col">Hestarias</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($fincas as $finca)
                    <tr>
                        <th scope="col">{{$finca->parcela}}</th>
                        <th scope="col">{{$finca->poligono}}</th>
                        <th scope="col">{{$finca->municipio}}</th>
                        <th scope="col">{{$finca->provincia}}</th>
                        <th scope="col">{{$finca->hectarias}}</th>
                        <th scope="col">
                            <a class='btn' href="{{ route('finca.show', $finca->id) }}"><i class="ri-eye-line"></i></a>
                            <a class="btn" href="{{ route('finca.edit', $finca->id) }}"><i class="ri-pencil-line"></i></a>
                            @if ($finca->deleted_at)
                                <a class="btn" href="{{ route('finca.restablecer', $finca->id) }}"><i class="ri-arrow-up-circle-fill"></i></a>
                            @else
                                <button class='btn' onclick="window.modal.showModal();"><i class="ri-arrow-down-circle-fill"></i></button>
                            @endif


                        </th>
                    </tr>
                    <dialog id="modal">
                        {!! Form::open(['method'=>'delete','url'=>route('finca.destroy', $finca->id)]) !!}
                            <p>Se va a eliminar el registro</p>
                            {!! Form::submit('Acceptar', ['onclick'=>'window.modal.close();']) !!}
                            <button onclick="window.modal.close();">Cancelar</button>
                        {!! Form::close() !!}
                    </dialog>
                @empty
                    <tr>
                        <th scope="col" colspan="4">No hay elementos</th>
                    </tr>
                @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{$fincas->links()}}
          </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('finca.create') }}" class="btn btn-secondary"><i class="ri-file-add-line"></i> Nuevo</a>
    </div>
  </div>
@endsection
