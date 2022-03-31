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
                <form method="post" action="{{ (isset($registro)) ? route('roles.update', $registro->id) : route('roles.store') }}" accept-charset="UTF-8" autocomplete="off">
                    @csrf
                    @if(isset($registro)) @method('PATCH') @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Categoría" value="{{ old('nombre', $registro->nombre ?? '') }}" />
                                @error('nombre') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('categorias.index') }}" class="btn btn-dark text-info">Cancelar</a>
                                <button type="submit" class="btn btn-dark">{{ $selected_id < 1 ? 'Guardar' : 'Actualizar'}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection