<div class="connect-sorting">
    <div class="connect-sorting-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="car-body">
                <div class="table-responsive tblscroll" style="max-height: 650px;">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c;">
                            <tr>
                                <th class="table-th text-white text-center" width="15%">Producto</th>
                                <th class="table-th text-white text-center" width="10%">Precio</th>
                                <th class="table-th text-white text-center" width="10%">Cantidad</th>
                                <th class="table-th text-white text-center" width="20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $producto)
                            <tr>
                                <td><h6>{{ $producto->nombre }}</h6></td>
                                <td class="text-center"><h6>${{ number_format($producto->precio, 2) }}</h6></td>
                                <td class="text-center">
                                    <h6>
                                        <input type="text" name="cantidad" id="cantidad_{{ $producto->id }}" readonly="true" class="cantidad text-center" style="width: 50px" />
                                        <input type="hidden" name="producto_id" class="producto_id" value="{{ $producto->id }}" />
                                    </h6>
                                </td>
                                <td class="text-center">
                                    <button onclick="eliminaProducto('{{ $producto->id }}')" class="btn btn-dark mbmobile">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                    <button onclick="decrementaCompra('{{ $producto->id }}')" class="btn btn-dark mbmobile">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button onclick="incrementaCompra('{{ $producto->id }}')" class="btn btn-dark mbmobile">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datos->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
