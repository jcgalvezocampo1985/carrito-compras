<div class="row">
    <div class="col-sm-12">
        <div>
            <div class="connect-sorting">
                <h5 class="text-center mb-3">Resumen de Compra</h5>
                <div class="connect-sorting-content">
                    <div class="card simple-title-task ui-sortable-handle">
                        <div class="card-body">
                            <div class="task-header">
                                <div>
                                    <h2>Total: $<span id="total_compra">{{ number_format($total_compra, 2) }}</span></h2>
                                </div>
                                <div>
                                    <h4 class="mt-3">Sub Total: $<span id="subtotal">{{ number_format($subtotal, 2) }}</span></h4>
                                </div>
                                <div>
                                    <h4 class="mt-3">Impuesto: $<span id="total_impuesto">{{ number_format($total_impuesto, 2) }}</span></h4>
                                </div>
                                <div>
                                    <h4 class="mt-3">Productos: <span id="total_productos">{{ $total_productos }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button onclick="eliminarCarrito()" class="btn btn-dark mbmobile">
                    Cancelar Compra
                </button>
                <button onclick="guardarCompra()" class="btn btn-dark mbmobile">
                    Guardar Compra
                </button>
            </div>
        </div>
    </div>
</div>