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
                <form method="post" action="{{ (isset($registro)) ? route('usuarios.update', $registro->id) : route('usuarios.store') }}" accept-charset="UTF-8" autocomplete="off">
                    @csrf
                    @if(isset($registro)) @method('PATCH') @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" splaceholder="ej: Admin" value="{{ old('name', $registro->name ?? '') }}" maxlength="255" />
                                @error('name') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="ej: correo@correo.com" value="{{ old('email', $registro->email ?? '') }}" maxlength="255" />
                                @error('email') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="ej: ***" maxlength="255" />
                                @error('password') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Rol</label>
                                <select class="form-control" required id="role_id" name="role_id">
                                    <option value="" selected="selected"></option>
                                    @foreach($roles as $row)
                                    <option value="{{ $row->id }}" {{ (isset($registro)) ? ($row->id == $registro->roles->id) ? 'selected="selected"' : '' : '' }}>{{ $row->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('stock_minimo') <span class="text-danger er">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('roles.index') }}" class="btn btn-dark text-info">Cancelar</a>
                                <button type="submit" class="btn btn-dark">{{ $selected_id < 1 ? 'Guardar' : 'Actualizar' }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection