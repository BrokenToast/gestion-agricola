<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGananciaRequest;
use App\Http\Requests\UpdateGananciaRequest;
use App\Models\Finca;
use App\Models\Ganancia;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GananciaController extends Controller
{
    /**
     * index
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $ganancias = Ganancia::filtrarDescripcion($request->comprador)->paginate();
        return view('ganancia.index', compact('ganancias'));
    }

    /**
     * create
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $fincas = Finca::all()->pluck('identificadores', 'id')->toArray();
        $temporadas = Temporada::all()->pluck('comiezo_final_temporada', 'id');
        return view('ganancia.create', compact('fincas', 'temporadas'));
    }

    /**
     * store
     *
     * Store a newly created resource in storage.
     *
     * @param StoreTemporadaRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGananciaRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Ganancia::create($request->validated());
            DB::commit();
            return redirect()->route('ganancia.index')->with('success', 'Se a creado corectamente');
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
     * @param Temporada $temporada
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($ganancia): \Illuminate\Contracts\View\View
    {
        $ganancia = Ganancia::findOrFail($ganancia);
        $fincas = Finca::all()->pluck('identificadores', 'id')->toArray();
        $temporadas = Temporada::all()->pluck('comiezo_final_temporada', 'id');
        return view('ganancia.edit', compact('ganancia', 'fincas', 'temporadas'));
    }

    /**
     * update
     *
     * Update the specified resource in storage.
     *
     * @param UpdateTemporadaRequest $request
     * @param Temporada $temporada
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGananciaRequest $request, $ganancia): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Ganancia::findOrFail($ganancia)->update($request->validated());
            DB::commit();
            return redirect()->route('ganancia.index')->with('success', 'Se a editado corectamente');
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
     * @param Temporada $temporada
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($ganancia): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Ganancia::findOrFail($ganancia)->delete();
            DB::commit();
            return redirect()->route('ganancia.index')->with('success', 'Se a eliminar corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al eliminar");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al eliminar');
        }
    }
}
