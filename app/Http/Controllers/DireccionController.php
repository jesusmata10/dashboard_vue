<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Ciudad;


class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direccion $direccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direccion $direccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direccion $direccion)
    {
        //
    }

    public function municipioAjaxUser(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            // $lista = Municipio::listaMunicipios($request->entidad_id);
            $lista = Municipio::where('entidad_id', $request->entidad_id)->get();
            // dd($lista);
            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODOS">TODOS LOS MUNICIPIOS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->municipio . '</option>';
            }
        }
    }

    public function parroquiaAjaxUser(Request $request)
    {
        if ($request->ajax()) {
            // $lista = Parroquia::listaParroquias($request->municipio_id);
            $lista = Parroquia::where('municipio_id', $request->municipio_id)->get();

            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODAS">TODAS LAS PARROQUIAS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->parroquia . '</option>';
            }
        }
    }

    public function ciudadAjaxUser(Request $request)
    {
        if ($request->ajax()) {
            // $lista = Municipio::listaMunicipios($request->entidad_id);
            $lista = Ciudad::where('estado_id', $request->entidad_id)->get();

            // dd($lista);
            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODOS">TODOS LOS MUNICIPIOS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->ciudad . '</option>';
            }
        }
    }
}
