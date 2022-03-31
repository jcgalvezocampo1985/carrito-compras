<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Compra;
use App\Models\Producto;
use App\Http\Requests\CompraRequest;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
{
    private $pagination = 4;
    public $titulo = 'Listado';
    public $controlador = 'Productos';
    public $selected_id = 0;
    public $total_productos = 0;
    public $total_compra = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Producto::paginate($this->pagination);
        $total_compra = Cart::getTotal() + $this->calcularImpuestoTotal();

        return view('compras.index', compact('datos'))
                                        ->with(['titulo' => $this->titulo])
                                        ->with(['controlador' => $this->controlador])
                                        ->with(['subtotal' => Cart::getTotal()])
                                        ->with(['total_compra' => $total_compra])
                                        ->with(['total_productos' => Cart::getTotalQuantity()])
                                        ->with(['total_impuesto' => $this->calcularImpuestoTotal()]);
    }

    public function cantidadProducto($producto_id)
    {
        $carrito = Cart::get($producto_id);
        $cantidad = $carrito ? $carrito->quantity : "";

        return $cantidad;
    }

    public function calcularImpuestoTotal()
    {
        $carrito = Cart::getContent();

        $impuesto_acumulado = 0;
        foreach($carrito as $row)
        {
            $producto_id = $row->id;
            $precio = $row->price;
            $producto_nombre = $row->name;
            $total_producto = $row->quantity;

            $producto = Producto::find($producto_id);
            $impuesto = $producto->impuesto;
            $impuesto_a_pagar = ($precio * ($impuesto / 100)) * $total_producto;

            $impuesto_acumulado = $impuesto_acumulado + $impuesto_a_pagar;
        }

        return number_format($impuesto_acumulado, 2);
    }

    public function incrementaCompra($producto_id)
    {
        $cantidad = 1;
        $mensaje = '';
        $title = '';
        $producto = Producto::find($producto_id);
        $exist = Cart::get($producto_id);
        $stock_actual = $producto->stock_actual;
        $producto_impuesto = $producto->impuesto;

        if($exist)
        {
            if($stock_actual < ($cantidad + $exist->quantity))
            {
                $stock_actual = $producto->stock_actual - $exist->quantity;
                return response()->json(['mensaje' => 'Stock insuficiente', 'stock_actual' => $stock_actual]);
            }
        }
        Cart::add($producto->id, $producto->nombre, $producto->precio, $cantidad, "");
    
        $subtotal = number_format(Cart::getTotal(), 2);
        $total_productos = Cart::getTotalQuantity();
        $total_impuesto = $this->calcularImpuestoTotal();
        $total_compra = number_format($subtotal + $total_impuesto, 2);
        
        return response()->json(['subtotal' => $subtotal, 'total_impuesto' => $total_impuesto, 'total_compra' => $total_compra, 'total_productos' => $total_productos, 'stock_actual' => $stock_actual, 'mensaje' => '']);
    }

    public function decrementaCompra($producto_id)
    {
        $producto = Producto::find($producto_id);
        $item = Cart::get($producto_id);
        Cart::remove($producto_id);

        $cantidad_nueva = $item->quantity - 1;

        if ($cantidad_nueva > 0)
        {
            Cart::add($producto->id, $producto->nombre, $producto->precio, $cantidad_nueva);
        }

        $subtotal = number_format(Cart::getTotal(), 2);
        $total_impuesto = $this->calcularImpuestoTotal();
        $total_productos = Cart::getTotalQuantity();
        $total_compra = number_format($subtotal + $total_impuesto, 2);

        return response()->json(['subtotal' => $subtotal, 'total_impuesto' => $total_impuesto, 'total_compra' => $total_compra, 'total_productos' => $total_productos]);
    }

    public function eliminaProducto($product_id)
    {
        Cart::remove($product_id);

        $subtotal = number_format(Cart::getTotal(), 2);
        $total_impuesto = $this->calcularImpuestoTotal();
        $total_productos = Cart::getTotalQuantity();
        $total_compra = number_format($subtotal + $total_impuesto, 2);

        return response()->json(['subtotal' => $subtotal, 'total_impuesto' => $total_impuesto, 'total_compra' => $total_compra, 'total_productos' => $total_productos]);
    }

    public function limpiarCarrito()
    {
        Cart::clear();

        $subtotal = number_format(Cart::getTotal(), 2);
        $total_impuesto = $this->calcularImpuestoTotal();
        $total_productos = Cart::getTotalQuantity();
        $total_compra = number_format($subtotal + $total_impuesto, 2);

        return response()->json(['subtotal' => $subtotal, 'total_impuesto' => $total_impuesto, 'total_compra' => $total_compra, 'total_productos' => $total_productos]);
    }

    public function guardarCompra()
    {
        $total_productos = Cart::getTotalQuantity();
        if($total_productos <= 0)
        {
            return 'No hay productos en el carrito';
        }

        //Iniciar la transacción
        DB::beginTransaction();

        try
        {
            $factura = Factura::create([
                'status' => 'Pendiente',
                'user_id' => Auth()->user()->id,
                'created_at' => date('Y-m-d h:i:s')
            ]);

            if($factura)
            {
                $items = Cart::getContent();

                foreach($items as $item)
                {
                    $producto_id = $item->id;
                    $cantidad = $item->quantity;

                    $producto = Producto::find($producto_id);
                    $precio = $producto->precio;
                    $impuesto = $producto->impuesto;
                    $stock_actual = $producto->stock_actual;

                    $impuesto_total = ($precio * ($impuesto / 100));
                    $total = ($precio + $impuesto_total);

                    for($i = 1; $i <= $cantidad; $i++)
                    {
                        Compra::create([
                            'precio' => $precio,
                            'impuesto' => $impuesto,
                            'impuesto_total' => $impuesto_total,
                            'total' => $total,
                            'producto_id' => $item->id,
                            'factura_id' => $factura->id
                        ]);
                    }

                    $producto->stock_actual = $stock_actual - $item->quantity;
                    $producto->save();
                }
            }
            //Confirmar la transacción
            DB::commit();

            Cart::clear();

            return 'Compra registrada satisfactoriamente';
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
