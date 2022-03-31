<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\User;
use App\Models\Compra;

class FacturaController extends Controller
{
    private $pagination = 5;
    public $titulo = 'Listado';
    public $controlador = 'Facturas';
    public $selected_id = 0;

    public function index()
    {
        $datos = Factura::with('user', 'compras')->orderBy('created_at', 'DESC')->paginate($this->pagination);

        return view('facturas.index', compact('datos'))
                                        ->with(['titulo' => $this->titulo])
                                        ->with(['controlador' => $this->controlador]);
    }

    public function detalleCompra($factura_id)
    {
        $datos = Compra::with('producto')->where('factura_id', $factura_id)->get();
        $impuesto_total = $datos->sum('impuesto_total');
        $total = $datos->sum('total');

        return view('facturas.tablaDetalleCompra', compact('datos'))
                                                ->with(['impuesto_total' => $impuesto_total])
                                                ->with(['total' => $total]);
    }
}