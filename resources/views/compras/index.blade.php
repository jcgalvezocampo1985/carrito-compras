@extends("layouts.theme.app")

@section('content')
<div>
    <style></style>
    <div class="row layout-top-spacing">
        <div class="col-sm-12 col-md-8">
            @include("compras.partials.productos")
        </div>
        <div class="col-sm-12 col-md-4">
            @include("compras.partials.total")
        </div>
    </div>
</div>
@endsection
@include("compras.scripts.funciones")