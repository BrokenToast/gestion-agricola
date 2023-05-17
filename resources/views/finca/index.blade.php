@extends('layouts.app')

@section('main')
<div class="card">
    <div class="card-header">
        Finca
    </div>
    <div class="card-body">
        <div>
            {!! Form::open(['method'=>'get']) !!}
            {!! Form::text('busqueda_num_parcela', null, ['class'=>'form-text','placeholder'=>'Numero de parcela']) !!}

            {!! Form::checkbox('baja', '1', null, ['class'=>'form-checkbox','id'=>'baja']) !!}
            {!! Form::label('baja','Baja', ['class'=>'form-label']) !!}

            {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
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
          <div class="text-center">{{$fincas->links()}}</div>
    </div>
    <div class="card-footer">
        <a href="{{ route('finca.create') }}" class="btn btn-secondary"><i class="ri-file-add-line"></i> Nuevo</a>
    </div>

  </div>
@endsection
