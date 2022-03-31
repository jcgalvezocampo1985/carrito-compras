<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $pagination = 4;
    public $titulo = 'Listado';
    public $controlador = 'Usuarios';
    public $selected_id = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = User::with('roles')->paginate($this->pagination);

        return view('usuarios.index', compact('datos'))
                                        ->with(['titulo' => $this->titulo])
                                        ->with(['controlador' => $this->controlador])
                                        ->with(['selected_id' => $this->selected_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->titulo = 'Agregar';
        $roles = Roles::all();

        return view('usuarios.form', compact('roles'))->with(['titulo' => $this->titulo])
                                                      ->with(['controlador' => $this->controlador])
                                                      ->with(['selected_id' => $this->selected_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $query = new User($request->validated());
        $query->password = bcrypt($request->password);
        $query->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = User::findOrFail($id, ['id','name', 'email', 'role_id']);
        $this->titulo = 'Actualizar';
        $this->selected_id = $registro->id;
        $roles = Roles::all();

        return view('usuarios.form', compact('registro', 'roles'))
                                    ->with(['titulo' => $this->titulo])
                                    ->with(['controlador' => $this->controlador])
                                    ->with(['selected_id' => $this->selected_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $query = User::find($id);
        $query->fill($request->validated());
        $query->password = bcrypt($request->password);
        $query->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = User::find($id);

        return $query->delete();
    }
}
