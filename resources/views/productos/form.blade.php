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
                <form method="post" action="{{ (isset($registro)) ? route('productos.update', $registro->id) : route('productos.store') }}" accept-charset="UTF-8" autocomplete="off">
                    @csrf
                    @if(isset($registro)) @method('PATCH') @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="ej: Reloj" value="{{ old('nombre', $registro->nombre ?? '') }}" maxlength="255" />
                                @error('nombre') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control" placeholder="ej: 0.00" value="{{ old('precio', $registro->precio ?? '') }}" maxlength="7" />
                                @error('precio') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Impuesto</label>
                                <input type="text" name="impuesto" id="impuesto" class="form-control" placeholder="ej: 0.00" value="{{ old('impuesto', $registro->impuesto ?? '') }}" maxlength="7" />
                                @error('impuesto') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Stock Actual</label>
                                <input type="text" name="stock_actual" id="stock_actual" class="form-control" placeholder="ej: 40" value="{{ old('stock_actual', $registro->stock_actual ?? '') }}" maxlength="11"/>
                                @error('stock_actual') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Stock Mínimo</label>
                                <input type="text" name="stock_minimo" id="stock_minimo" class="form-control" placeholder="ej: 20" value="{{ old('stock_minimo', $registro->stock_minimo ?? '') }}" maxlength="11"/>
                                @error('stock_minimo') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" required id="categoria_id" name="categoria_id">
                                    <option value="" selected="selected"></option>
                                    @foreach($categorias as $row)
                                    <option value="{{ $row->id }}" {{ (isset($registro)) ? ($row->id == $registro->categoria->id) ? 'selected="selected"' : '' : '' }}>{{ $row->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('stock_minimo') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('productos.index') }}" class="btn btn-dark text-info">Cancelar</a>
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