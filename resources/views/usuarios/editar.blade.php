@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
    <div class="content-fluid">
        <div class="row" id="app">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-user">
                    <div class="image">
                        <img src="/img/background/blurred-1525842692193-3271.jpg" >
                    </div>
                    <div class="card-content">
                        <div class="author">
                            <img class="avatar border-white" src="{{ $usuario->profile_pic}}" alt="{{ $usuario->get_full_name() }}">
                            <h4 class="card-title">{{ $usuario->get_full_name() }}<br>
                                <small>{{ $usuario->email }}</small><br>
                                <small>{{ $usuario->user_name }}</small>
                            </h4>
                            <hr>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-left">Detalles</h4>
                                    <div class="row">
                                        <strong class="col-md-5 text-left">Nombre</strong>
                                        <p class="col-md-7 text-left">{{ $usuario->name }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-5 text-left">Apellido</strong>
                                        <p class="col-md-7 text-left">{{ $usuario->last_name }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-5 text-left">Nombre de usuario</strong>
                                        <p class="col-md-7 text-left">{{ $usuario->user_name }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-5 text-left">Correo Electrónico</strong>
                                        <p class="col-md-7 text-left">{{ $usuario->email }}</p>
                                    </div>
                                    <div class="row">
                                        <strong class="col-md-5 text-left">Pais</strong>
                                        <p class="col-md-7 text-left">{{ $usuario->country }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-left">Niveles de accesso</h4>
                                    @foreach ($roles as $role)
                                        <div class="row">
                                            <strong class="col-md-4 text-left">{{ $role->display_name }}</strong>
                                            <p class="col-md-8 text-left">{{ $role->description }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <form method="get" action="/" class="form-horizontal">
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name" placeholder="{{ $usuario->name }}">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Apellido</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="form-control" class="form-control" name="last_name" placeholder="{{ $usuario->last_name }}">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Correo Electrónico</label>
                                                <div class="col-sm-9">
                                                <input type="email" placeholder="{{ $usuario->email }}" class="form-control" name="email">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pais</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Disabled input here..." class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>

                                    </form>
                                </div>
                            </div>
                            
                            <br>
                            <div class="card-footer">
                                <a href="/Usuario/{{ Auth::user()->id }}/edit" class="btn btn-wd btn-default text-center">
                                    <span class="btn-label">
                                        <i class="ti-pencil"></i>
                                    </span>
                                    Editar Perfil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection