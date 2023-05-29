@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        <h3>Gastos</h3>
    </div>
    <div class="card-body">
        <div>
            {!! Form::open(['method'=>'get']) !!}
            {!! Form::text('descripcion', null, ['class'=>'form-text','placeholder'=>'Buscar por descripcion']) !!}

            {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <hr>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha</th>
                <th scope="col">Tipo de gasto</th>
                <th scope="col">Finca</th>
                <th scope="col">Temporada</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($gastos as $gasto)
                    <tr>
                        <th scope="col">{{$gasto->descripcion}}</th>
                        <th scope="col">{{$gasto->cantidad}}</th>
                        <th scope="col">{{$gasto->fecha}}</th>
                        <th scope="col">{{$gasto->tipoDeGasto->nombre}}</th>
                        <th scope="col">{{$gasto->finca->identificadores}}</th>
                        <th scope="col">{{$gasto->temporada->comiezo_final_temporada}}</th>

                        <th scope="col">
                            <a class="btn" href="{{ route('gasto.edit', $gasto->id) }}"><i class="ri-pencil-line"></i></a>
                            <button class='btn' onclick="window.modal.showModal();"><i class="ri-delete-bin-line"></i></button>
                        </th>
                    </tr>
                    <dialog id="modal">
                        {!! Form::open(['method'=>'delete','url'=>route('gasto.destroy', $gasto->id)]) !!}
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
            {{$gastos->links()}}
          </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('gasto.create') }}" class="btn btn-secondary"><i class="ri-file-add-line"></i> Nuevo</a>
    </div>

  </div>
@endsection
