<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    private $pagination = 4;
    public $titulo = 'Listado';
    public $controlador = 'Categorías';
    public $selected_id = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Categoria::paginate($this->pagination);

        return view('categorias.index', compact('datos'))
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

        return view('categorias.form')->with(['titulo' => $this->titulo])
                                    ->with(['controlador' => $this->controlador])
                                    ->with(['selected_id' => $this->selected_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $query = new Categoria($request->validated());
        $query->save();

        return redirect()->route('categorias.index');
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
        $registro = Categoria::findOrFail($id, ['id','nombre']);
        $this->titulo = 'Actualizar';
        $this->selected_id = $registro->id;

        return view('categorias.form', compact('registro'))
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
    public function update(CategoriaRequest $request, $id)
    {
        $query = Categoria::find($id);
        $query->fill($request->validated());
        $query->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Categoria::find($id);

        return $query->delete();
    }
}
