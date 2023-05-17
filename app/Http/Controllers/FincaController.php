<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFincaRequest;
use App\Http\Requests\UpdateFincaRequest;
use App\Models\Finca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FincaController extends Controller
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
        $fincas = Finca::filtrarPorBaja($request->baja)->paginate();
        return view('finca.index', compact('fincas'));
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
        return view('finca.create');
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
    public function store(StoreFincaRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $finca = $request->validated();
            $finca += ['usuario_id' => auth()->user()->id];
            Finca::create($finca);
            DB::commit();
            return redirect()->route('finca.index')->with('success', 'Se a creado corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al crear");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al crear')->withInput($request->all());
        }
    }

    /**
     * show
     *
     * @param Finca $finca
     *
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Finca $Finca): \Illuminate\Contracts\View\View
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
    public function edit(Finca $finca): \Illuminate\Contracts\View\View
    {
        return view('finca.edit', compact('finca'));
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
    public function update(UpdateFincaRequest $request, Finca $finca): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $finca->update($request->validated());
            DB::commit();
            return redirect()->route('finca.index')->with('success', 'Se a editado corectamente');
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
    public function destroy(Finca $finca): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $finca->delete();
            DB::commit();
            return redirect()->route('finca.index')->with('success', 'Se a eliminar corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al eliminar");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al eliminar');
        }
    }
    public function restablecer($finca)
    {
        try {
            DB::beginTransaction();
            Finca::filtrarPorBaja()->findOrFail($finca)->restore();
            DB::commit();
            return redirect()->route('finca.index')->with('success', 'Se a restablecido corectamente');
        } catch (\Exception $th) {
            DB::rollback();
            Log::error("Error al restablecer");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al restablecer');
        }
    }
}
