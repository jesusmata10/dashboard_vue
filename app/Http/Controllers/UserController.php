<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Parentesco;
use App\Models\Estado;
use App\Models\Persona;
use App\Http\Requests\User\UserRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        //$personas = Persona::all();
        $parentesco = Parentesco::all();
        $estados = Estado::all();
        $roles = Role::select('id', 'name')->orderBy('name')->get();
        //dd($usuarios);

        return Inertia::render('Usuario/Index', [
            'usuarios' => $usuarios,
            'roles' => $roles,
            'parentesco' => $parentesco,
            'estados' => $estados,
        ]);
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
    public function store(UserRequest $request)
    {
        dd($request);
        try {
            $user = new User($request->all());
            $user->save();

            return redirect('usuarios')->with('msj', 'Usuario creado sastifactoriamente');
        } catch (\Throwable $th) {
            return redirect('usuarios')->with('error', '¡Ha ocurrido un error!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
