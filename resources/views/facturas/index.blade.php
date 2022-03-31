@extends("layouts.theme.app")

@section('content')
<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $controlador }} | {{ $titulo }}</b>
                </h4>
            </div>
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c;">
                            <tr>
                                <th class="table-th text-white text-center">No. Factura</th>
                                <th class="table-th text-white text-center">Usuario</th>
                                <th class="table-th text-white text-center">Fecha</th>
                                <th class="table-th text-white text-center">No. Productos</th>
                                <th class="table-th text-white text-center">Total</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $factura)
                            <tr>
                                <td class="text-center"><h6>{{ $factura->id }}</h6></td>
                                <td class="text-center"><h6>{{ $factura->user->name }}</h6></td>
                                <td class="text-center"><h6>{{ $factura->created_at }}</h6></td>
                                <td class="text-center"><h6>{{ $factura->compras->count() }}</h6></td>
                                <td class="text-center"><h6>${{ number_format($factura->compras->sum('total'), 2) }}</h6></td>
                                <td class="text-center">
                                    <a href="#" onclick="detalleCompra({{ $factura->id }})" class="btn btn-dark" title="Detalle Factura" data-toggle="modal" data-target="#theModal"><i class="fas fa-bag-shopping"></i></a>
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
    @include('facturas.modalDetalleCompra');
</div>
@endsection
<script>
    function detalleCompra(factura_id)
    {
        $.ajax({
            url: 'facturas/detalleCompra/'+factura_id,
            type: 'GET',
            success: function(data){
                $('.modal-body').html(data);
            }
        });
    }
</script>