@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Temporadas
    </div>
    <div class="card-body">
        <div class="d-felx">
            {!! Form::open(['method'=>'GET','url'=>route('temporada.index')]) !!}
                {!! Form::label('fecha_inicio', 'Fecha Inicio', ['class'=>'form-label']) !!}
                {!! Form::date('fecha_inicio',null, ['id'=>'fecha_inicio','class'=>'form-date']) !!}
                <button type="submit" class="btn btn-primary">Buscar</button>
            {!! Form::close() !!}
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Inicio temporada</th>
                <th scope="col">Fin de la temporada</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($temporadas as $temporada)
                    <tr>
                        <th scope="col">{{$temporada->fecha_inicio}}</th>
                        <th scope="col">{{$temporada->fecha_fin}}</th>
                        <th scope="col">{{$temporada->observaciones}}</th>
                        <th scope="col">
                            <a class='btn' href="{{ route('temporada.show', $temporada->id) }}"><i class="ri-eye-line"></i></a>
                            @if (!$temporada->fecha_fin)
                                <a class="btn" href="{{ route('temporada.edit', $temporada->id) }}">Finalizar</a>
                            @endif
                            <button class='btn' onclick="window.modal.showModal();"><i class="ri-delete-bin-line"></i></button>
                        </th>
                    </tr>
                    <dialog id="modal">
                        {!! Form::open(['method'=>'delete','url'=>route('temporada.destroy', $temporada->id)]) !!}
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
            {{$temporadas->links()}}
          </div>

    </div>
    <div class="card-footer">
        <a href="{{ route('temporada.create') }}" class="btn btn-secondary"><i class="ri-file-add-line"></i> Nuevo</a>
    </div>

  </div>
@endsection
