@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Ganancias
    </div>
    <div class="card-body">
        <div>
            {!! Form::open(['method'=>'get']) !!}
            {!! Form::text('comprador', null, ['class'=>'form-text','placeholder'=>'Buscar por comprador']) !!}

            {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <hr>
        <table class="table">
            <thead>
              <tr>

                <th scope="col">Comprador</th>
                <th scope="col">Precio Tonelada</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha</th>
                <th scope="col">Finca</th>
                <th scope="col">Temporada</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($ganancias as $ganancia)
                    <tr>
                        <th scope="col">{{$ganancia->comprador}}</th>
                        <th scope="col">{{$ganancia->precio_tonelada}}</th>
                        <th scope="col">{{$ganancia->cantidad}}</th>
                        <th scope="col">{{$ganancia->fecha}}</th>
                        <th scope="col">{{$ganancia->finca->identificadores}}</th>
                        <th scope="col">{{$ganancia->temporada->comiezo_final_temporada}}</th>
                        <th scope="col">
                            <a class="btn" href="{{ route('ganancia.edit', $ganancia->id) }}"><i class="ri-pencil-line"></i></a>
                            <button class='btn' onclick="window.modal.showModal();"><i class="ri-delete-bin-line"></i></button>
                        </th>
                    </tr>
                    <dialog id="modal">
                        {!! Form::open(['method'=>'delete','url'=>route('ganancia.destroy', $ganancia->id)]) !!}
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
            {{$ganancias->links()}}
          </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('ganancia.create') }}" class="btn btn-secondary"><i class="ri-file-add-line"></i> Nuevo</a>
    </div>

  </div>
@endsection
