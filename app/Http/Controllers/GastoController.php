<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGastoRequest;
use App\Http\Requests\UpdateGastoRequest;
use App\Models\Finca;
use App\Models\Gasto;
use App\Models\Temporada;
use App\Models\TipoDeGasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GastoController extends Controller
{
    /**
     * index
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $gastos = Gasto::filtrarPorDescripcion($request->descripcion)->paginate();
        return view('gasto.index', compact('gastos'));
    }

    /**
     * create
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $fincas = Finca::all()->pluck('identificadores', 'id')->toArray();
        $temporadas = Temporada::all()->pluck('comiezo_final_temporada', 'id');
        $tipo_de_gastos = TipoDeGasto::all()->pluck('nombre', 'id')->toArray();
        return view('gasto.create', compact('fincas', 'temporadas', 'tipo_de_gastos'));
    }

    /**
     * store
     *
     * Store a newly created resource in storage.
     *
     * @param StoreGastoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGastoRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Gasto::create($request->validated());
            DB::commit();
            return redirect()->route('gasto.index')->with('success', 'Se a creado corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al crear");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al crear')->withInput($request->all());
        }
    }

    /**
     * edit
     *
     * Show the form for editing the specified resource.
     *
     * @param mixed $gasto
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($gasto): \Illuminate\Contracts\View\View
    {
        $gasto = Gasto::findOrFail($gasto);
        $fincas = Finca::all()->pluck('identificadores', 'id')->toArray();
        $temporadas = Temporada::all()->pluck('comiezo_final_temporada', 'id');
        $tipo_de_gastos = TipoDeGasto::all()->pluck('nombre', 'id')->toArray();
        return view('gasto.edit', compact('gasto', 'fincas', 'temporadas', 'tipo_de_gastos'));
    }

    /**
     * update
     *
     * Update the specified resource in storage.
     *
     * @param UpdateGastoRequest $request
     * @param mixed $gasto
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGastoRequest $request, $gasto): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Gasto::findOrFail($gasto)->update($request->validated());
            DB::commit();
            return redirect()->route('gasto.index')->with('success', 'Se a editado corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al editar");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al editado');
        }
    }

    /**
     * destroy
     *
     * Remove the specified resource from storage.
     *
     * @param mixed $gasto
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($gasto): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Gasto::findOrFail($gasto)->delete();
            DB::commit();
            return redirect()->route('gasto.index')->with('success', 'Se a eliminar corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al eliminar");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al eliminar');
        }
    }
}
