@extends('layouts.app')

@section('main')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Ganancias
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Comprador</th>
                    <th scope="col">Precio Tonelada</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Finca</th>
                    <th scope="col">Temporada</th>
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
                        </tr>
                    @empty
                        <tr>
                            <th scope="col" colspan="4">No hay elementos</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center">{{$ganancias->links()}}</div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Gastos
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tipo de gasto</th>
                    <th scope="col">Finca</th>
                    <th scope="col">Temporada</th>
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
                        </tr>
                    @empty
                        <tr>
                            <th scope="col" colspan="4">No hay elementos</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center">{{$gastos->links()}}</div>
        </div>
      </div>
    </div>
  </div>
@endsection
