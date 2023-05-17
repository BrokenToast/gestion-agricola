<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemporadaRequest;
use App\Http\Requests\UpdateTemporadaRequest;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TemporadaController extends Controller
{
    /**
     * index
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $temporadas = Temporada::all();
        return view('temporada.index', compact('temporadas'));
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
        return view('temporada.create');
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
    public function store(StoreTemporadaRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            Temporada::create(['fecha_inicio' => $request->validated('fecha_inicio'), 'usuario_id' => auth()->user()->id]);
            DB::commit();
            return redirect()->route('temporada.index')->with('success', 'Se a creado corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al crear");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al crear');
        }
    }

    /**
     * show
     *
     * @param Temporada $temporada
     *
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Temporada $temporada): \Illuminate\Contracts\View\View
    {
        //
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
    public function edit(Temporada $temporada): \Illuminate\Contracts\View\View
    {
        return view('temporada.edit', compact('temporada'));
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
    public function update(UpdateTemporadaRequest $request, Temporada $temporada): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $temporada->update($request->validated());
            DB::commit();
            return redirect()->route('temporada.index')->with('success', 'Se a eliminar corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al crear");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al eliminar');
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
    public function destroy(Temporada $temporada): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $temporada->delete();
            DB::commit();
            return redirect()->route('temporada.index')->with('success', 'Se a eliminar corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al crear");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al eliminar');
        }
    }
}
