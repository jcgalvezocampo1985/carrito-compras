@extends("layouts.theme.app")

@section('content')
<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $controlador }} | {{ $titulo }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="{{ route('categorias.create') }}" class="tabmenu bg-dark">Agregar</a>
                    </li>
                </ul>
            </div>
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c;">
                            <tr>
                                <th class="table-th text-white text-center">Categoría</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $categoria)
                            <tr>
                                <td>
                                    <h6>{{ $categoria->nombre }}</h6>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('categorias/'.$categoria->id.'/edit/') }}" class="btn btn-dark mtmobile" title="Actualizar"><i class="fas fa-edit"></i></a>
                                    <a href="#" onclick="Confirm('{{ $categoria->id }}')" class="btn btn-dark" title="Eliminar"><i class="fas fa-trash"></i></a>
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
@endsection
<style>
    .w-5{
        display: inline;
    }
</style>
<script>
    function Confirm(id, valor = 0)
    {
        if(valor > 0)
        {
            Swal.fire({
                icon: 'error',
                title: '¡¡Aviso!!',
                text: '¡¡No se puede eliminar porque tiene registros relacionados!!'
            })
            return;
        }

        swal({
            title: 'Confirmar',
            text: '¿Deseas eliminar el registro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c',
        }).then(function(result){
            if(result.value){
                $.ajax({
                    url: "/categorias/destroy/"+id,
                    type: "GET",
                    success: function(respuesta) {
                        window.location.href = "/categorias";
                    }
                });
            }
        })
    }
</script>