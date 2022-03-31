<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    private $pagination = 4;
    public $titulo = 'Listado';
    public $controlador = 'Productos';
    public $selected_id = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Producto::with('categoria')->paginate($this->pagination);

        return view('productos.index', compact('datos'))
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
        $categorias = Categoria::all();

        return view('productos.form', compact('categorias'))->with(['titulo' => $this->titulo])
                                    ->with(['controlador' => $this->controlador])
                                    ->with(['selected_id' => $this->selected_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $query = new Producto($request->validated());
        $query->save();

        return redirect()->route('productos.index');
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
        $registro = Producto::with('categoria')->findOrFail($id, ['id', 'nombre', 'precio', 'impuesto', 'stock_actual', 'stock_minimo', 'categoria_id']);
        $this->titulo = 'Actualizar';
        $this->selected_id = $registro->id;
        $categorias = Categoria::all();

        return view('productos.form', compact('registro', 'categorias'))
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
    public function update(ProductoRequest $request, $id)
    {
        $query = Producto::find($id);
        $query->fill($request->validated());
        $query->save();

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Producto::find($id);
        $query->delete();
    }
}
