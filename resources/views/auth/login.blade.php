@extends('layouts.auth')

@section('content')


   <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">
      <h4 class="fw-300 c-grey-900 mB-40">Iniciar sesión</h4>
         <form method="POST" action="/auth/login">
            {!! csrf_field() !!}
            
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="alert-heading">¡Ha ocurrido un error!</h4>
                        <p class="mb-0">{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            
            <div class="form-group">
                <label class="text-normal text-dark">Usuario</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Usuario" required>
            </div>
            
            <div class="form-group">
                <label class="text-normal text-dark">Contraseña</label>
                <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required>
            </div>
            
            <div class="form-group">
            <div class="peers ai-c jc-sb fxw-nw">
              <div class="peer">
                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                  <input type="checkbox" id="inputCall1" name="remember" class="peer">
                  <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                    <span class="peer peer-greed">Recordar credenciales</span>
                  </label>
                </div>
              </div>
              <div class="peer">
                <button class="btn btn-primary" type="submit">Login</button>
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

@if (session()->has('flash_notification')) 
<div class="alert alert-success">{!! session('flash_notification') !!}</div>
@endif

@endsection