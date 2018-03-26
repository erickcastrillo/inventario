@extends('layouts.auth')

@section('content')
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40">Nuevo registro</h4>
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="text-normal text-dark">Nombre de Usuario</label>
                <input type="text" class="form-control" placeholder="Nombre de Usuario" name="name" value="{{ old('name') }}" required >
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Correo Electrónico</label>
                <input type="email" class="form-control" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required >
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Contraseña</label>
                <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Confirmar Contraseña</label>
                <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <div class="peers ai-c jc-sb fxw-nw">
                    <div class="peer">
                        <button class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
@endsection