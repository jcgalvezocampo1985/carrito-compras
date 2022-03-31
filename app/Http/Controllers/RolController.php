<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Http\Requests\RolesRequest;

class RolController extends Controller
{
    private $pagination = 4;
    public $titulo = 'Listado';
    public $controlador = 'Roles';
    public $selected_id = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Roles::with('users')->paginate($this->pagination);

        return view('roles.index', compact('datos'))
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

        return view('roles.form')->with(['titulo' => $this->titulo])
                                    ->with(['controlador' => $this->controlador])
                                    ->with(['selected_id' => $this->selected_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $query = new Roles($request->validated());
        $query->save();

        return redirect()->route('roles.index');
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
        $registro = Roles::findOrFail($id, ['id','nombre']);
        $this->titulo = 'Actualizar';
        $this->selected_id = $registro->id;

        return view('roles.form', compact('registro'))
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
    public function update(RolesRequest $request, $id)
    {
        $query = Roles::find($id);
        $query->fill($request->validated());
        $query->save();

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Roles::find($id);

        return $query->delete();
    }
}
