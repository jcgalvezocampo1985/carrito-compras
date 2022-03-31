<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive tblscroll" style="max-height: 450px;">
            <table class="table table-bordered table-striped mt-1">
                <thead class="text-white" style="background: #3b3f5c;">
                    <tr>
                        <th class="table-th text-white text-center">Producto</th>
                        <th class="table-th text-white text-center">$ Precio</th>
                        <th class="table-th text-white text-center">% Impuesto</th>
                        <th class="table-th text-white text-center">$ Impuesto</th>
                        <th class="table-th text-white text-center">$ Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $compra)
                    <tr>
                        <td class="text-center"><h6>{{ $compra->producto->nombre }}</h6></td>
                        <td class="text-center"><h6>${{ $compra->precio }}</h6></td>
                        <td class="text-center"><h6>{{ number_format($compra->impuesto) }}%</h6></td>
                        <td class="text-center"><h6>${{ $compra->impuesto_total }}</h6></td>
                        <td class="text-center"><h6>${{ $compra->total }}</h6></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <h5 class="text-center font-weight-bold">Totales</h5>
                        </td>
                        <td>
                            <h5 class="text-center">${{ number_format($impuesto_total, 2) }}</h5>
                        </td>
                        <td>
                            <h5 class="text-center">${{ number_format($total, 2) }}</h5>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>