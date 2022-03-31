<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\FacturaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::resource('categorias', CategoriaController::class)->middleware('admin');
    Route::get('/categorias/destroy/{id}', [CategoriaController::class, 'destroy'])->middleware('admin');

    Route::resource('productos', ProductoController::class)->middleware('admin');
    Route::get('/productos/destroy/{id}', [ProductoController::class, 'destroy'])->middleware('admin');

    Route::resource('roles', RolController::class)->middleware('admin');
    Route::get('/roles/destroy/{id}', [RolController::class, 'destroy'])->middleware('admin');

    Route::resource('usuarios', UserController::class)->middleware('admin');
    Route::get('/usuarios/destroy/{id}', [UserController::class, 'destroy'])->middleware('admin');

    Route::get('/facturas', [FacturaController::class, 'index'])->middleware('admin');
    Route::get('/facturas/detalleCompra/{factura_id}', [FacturaController::class, 'detalleCompra'])->middleware('admin');

    Route::get('/compras', [CompraController::class, 'index']);
    Route::get('/compras/incrementaCompra/{product_id}', [CompraController::class, 'incrementaCompra']);
    Route::get('/compras/decrementaCompra/{product_id}', [CompraController::class, 'decrementaCompra']);
    Route::get('/compras/eliminaProducto/{product_id}', [CompraController::class, 'eliminaProducto']);
    Route::get('/compras/cantidadProducto/{product_id}', [CompraController::class, 'cantidadProducto']);
    Route::get('/compras/calcularImpuestoTotal', [CompraController::class, 'calcularImpuestoTotal']);
    Route::get('/compras/limpiarCarrito', [CompraController::class, 'limpiarCarrito']);
    Route::get('/compras/guardarCompra', [CompraController::class, 'guardarCompra']);
});