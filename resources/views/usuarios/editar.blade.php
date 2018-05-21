@extends('layouts.master') @section('content') @include('layouts.flashes')
<style>
    [v-cloak] {display: none}
</style>
<div class="content">
    <div class="content-fluid" id="app" v-cloak>
        <div class="card" > <!-- Informaction personal -->
            <div class="card-header">
                <h4 class="card-title">
                        Informacion b&aacute;sica
                </h4>
            </div>
            <div class="card-content">
                <form @submit.prevent="save_basic_info()" data-vv-scope="basic_information">
                    <div class="row form-horizontal" >
                        <div class="col-md-6">
                            <div v-bind:class="{'form-group': true, 'has-error': errors.has('basic_information.name') }">
                                <label class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-8">
                                    <input 
                                        type="text" 
                                        v-validate="'required'" 
                                        v-model="informacion.basic.name" 
                                        id="name" 
                                        name="name"
                                        data-vv-as="nombre"
                                        class="form-control">
                                    <span class="text-danger">@{{ errors.first('basic_information.name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div v-bind:class="{'form-group': true, 'has-error': errors.has('basic_information.last_name') }">
                                <label class="col-md-4 control-label">Apellido</label>
                                <div class="col-md-8">
                                    <input 
                                        type="text" 
                                        v-validate="'required'"
                                        v-model="informacion.basic.last_name" 
                                        id="last_name" 
                                        data-vv-as="apellido"
                                        name="last_name" 
                                        class="form-control">
                                    <span class="text-danger">@{{ errors.first('basic_information.last_name') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-horizontal" >
                        <div class="col-md-6">
                            <div v-bind:class="{'form-group': true, 'has-error': errors.has('basic_information.user_name') }">
                                <label class="col-md-4 control-label">Nombre de Usuario</label>
                                <div class="col-md-8">
                                    <input 
                                        type="text" 
                                        v-validate="'required'" 
                                        data-vv-as="usuario"
                                        v-model="informacion.basic.user_name"
                                        id="user_name" 
                                        name="user_name" 
                                        class="form-control">
                                    <span class="text-danger">@{{ errors.first('basic_information.user_name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div v-bind:class="{'form-group': true, 'has-error': errors.has('basic_information.email') }">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input 
                                        type="email" 
                                        v-validate="'required|email'" 
                                        v-model="informacion.basic.email" 
                                        id="email" 
                                        name="email"
                                        data-vv-as="email"
                                        class="form-control">
                                    <span class="text-danger">@{{ errors.first('basic_information.email') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button
                            v-bind:disabled="errors.any('basic_information')"
                            class="btn btn-fill btn-info btn-magnify" 
                            type="submit">
                            <span class="btn-label">
                                <i class="ti-save"></i>
                            </span>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cambio de contraseña</h4>
            </div>
            <div class="card-content">
                <form @submit.prevent="password_change()" data-vv-scope="password_change">
                    <div class="row form-horizontal" >
                        <div class="col-md-6">
                            <div v-bind:class="{'form-group': true, 'has-error': errors.has('password_change.password') }">
                                <label class="col-md-4 control-label">Nueva Contraseña</label>
                                <div class="col-md-8">
                                    <input 
                                        type="password" 
                                        v-model="informacion.password_change.password" 
                                        id="password" 
                                        name="password"
                                        data-vv-as="contraseña"
                                        v-validate="'required|min:8|max:32|alpha_dash'"
                                        class="form-control">
                                    <span class="text-danger">@{{ errors.first('password_change.password') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div v-bind:class="{'form-group': true, 'has-error': errors.has('password_change.password_confirmation') }">
                                <label class="col-md-4 control-label">Repetir Contraseña</label>
                                <div class="col-md-8">
                                    <input 
                                        type="password" 
                                        v-model="informacion.password_change.password_confirmation" 
                                        id="password_confirmation" 
                                        name="password_confirmation"
                                        data-vv-as="confirmar contraseña"
                                        v-validate="'required|min:8|max:32|confirmed:password'" 
                                        class="form-control">
                                    <span class="text-danger">@{{ errors.first('password_change.password_confirmation') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button class="btn btn-fill btn-info btn-magnify" v-bind:disabled="errors.any('password_change')">
                            <span class="btn-label">
                                <i class="ti-save"></i>
                            </span>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @role(['Administrador', 'Superuser'])
            <div class="row">
                <form @submit.prevent="save_roles()" data-vv-scope="admin_roles">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manejo de Roles</h4>
                                <p class="category">Añada o remueva roles del usuario mostrado</p>
                            </div>
                            <div class="card-content">
                                <div v-bind:class="{'form-group': true, 'has-error': errors.has('admin_roles.roles_usuario_editar') }">
                                    <v-select 
                                        multiple
                                        v-model="informacion.admin.roles.roles_usuario_editar" 
                                        :options="informacion.admin.roles.roles_disponibles"
                                        id="roles_usuario_editar" 
                                        name="roles_usuario_editar"
                                        v-validate="'required'"
                                        data-vv-as="roles"
                                    ></v-select>
                                    <span class="text-danger">@{{ errors.first('admin_roles.roles_usuario_editar') }}</span>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button 
                                        class="btn btn-fill btn-info btn-magnify" 
                                        v-bind:disabled="errors.any('admin_roles')"
                                        type="submit">
                                        <span class="btn-label">
                                            <i class="ti-save"></i>
                                        </span>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form @submit.prevent="country_change()" data-vv-scope="paises">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cambiar pais de Usuario</h4>
                                <p class="category">
                                    Cambie el pais asignado al usuario
                                </p>
                            </div>
                            <div class="card-content">
                                <div v-bind:class="{'form-group': true, 'has-error': errors.has('admin_roles.roles_usuario_editar') }">
                                    <select 
                                        v-validate="'required'"
                                        id="pais" 
                                        name="pais"
                                        data-vv-as="pais"
                                        v-model="informacion.pais"
                                        class="form-control"
                                        >
                                        @foreach ($paises as $pais)
                                            <option id="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@{{ errors.first('admin_roles.roles_usuario_editar') }}</span>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button 
                                        class="btn btn-fill btn-info btn-magnify" 
                                        v-bind:disabled="errors.any('admin_roles')"
                                        type="submit">
                                        <span class="btn-label">
                                            <i class="ti-save"></i>
                                        </span>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endrole
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
  
        Vue.component('v-select', VueSelect.VueSelect);
        Vue.use(VeeValidate, {
            locale: 'es',
        });
  
      var vm = new Vue({
        el: '#app',
        data: {
            informacion: {
                full_name: "{{ $usuario->get_full_name() }}",
                basic: {
                    name: "{{ $usuario->name }}",
                    last_name: "{{ $usuario->last_name }}",
                    user_name: "{{ $usuario->user_name }}",
                    email: "{{ $usuario->email }}",
                },
                user_profile_pic: {
                    profile_pic: "{{ $usuario->profile_pic }}",
                    new_profile_pic: "",
                },
                password_change: {
                    password: "",
                    password_confirmation: "",
                },
                pais: "{{ Auth::user()->country }}",
                @role(['Administrador', 'Superuser'])
                    admin: {
                        country: "{{ $usuario->country }}",
                        roles: {
                            roles_disponibles: [
                                @foreach ($roles_usuario as $role)
                                    "{{ $role->display_name }}",
                                @endforeach
                            ],
                            roles_usuario_editar: [
                                @foreach ($roles_usuario_editar as $role)
                                    "{{ $role->display_name }}",
                                @endforeach
                            ],
                            user_id: {{ $usuario->id }}
                        }
                    },
                @endrole
            }
        },
        methods: {
            save_roles: function() {
                var _this = this;
                this.$validator.validateAll("admin_roles").then(result => {
                    if (result) {
                        var token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            context: this,
                            type: "put",
                            url: "/User/Update/Roles",
                            dataType: 'json',
                            data: {
                                _token: token,
                                roles_usuario_editar: _this.informacion.admin.roles.roles_usuario_editar,
                                user_id: _this.informacion.admin.roles.user_id,
                            },
                            success: function(result) {
                                swal({
                                    title: result.estado,
                                    text: result.mensaje,
                                    type: result.tipo,
                                    confirmButtonClass: "btn btn-success btn-fill",
                                    buttonsStyling: false
                                });
                            },
                            error: function(xhr) {
                                var errorMessage = '';
                                jQuery.each(xhr.responseJSON, function(i, val) {
                                    errorMessage += " - " + val + "<br>";
                                });
                                swal({
                                    title: 'Oh no, algo ha salido mal',
                                    html:
                                    '<b>Error:</b> ' + xhr.status + " " + xhr.statusText+ '<br>'+
                                    '<b>Mensaje</b> ' + '<br>' +
                                    errorMessage,
                                    type: 'error',
                                    confirmButtonClass: "btn btn-info btn-fill",
                                    buttonsStyling: false
                                });
                            }
                        });

                    }
                });
            },
            save_basic_info: function() {

                var _this = this;
                this.$validator.validateAll("basic_information").then(result => {
                    if (result) {
                        var token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            context: this,
                            type: "put",
                            url: "/User/Update/Basic",
                            dataType: 'json',
                            data: {
                                _token: token,
                                basic: _this.informacion.basic,
                            },
                            success: function(result) {
                                swal({
                                    title: result.estado,
                                    text: result.mensaje,
                                    type: result.tipo,
                                    confirmButtonClass: "btn btn-success btn-fill",
                                    buttonsStyling: false
                                });
                            },
                            error: function(xhr) {
                                var errorMessage = '';
                                jQuery.each(xhr.responseJSON, function(i, val) {
                                    errorMessage += " - " + val + "<br>";
                                });
                                swal({
                                    title: 'Oh no, algo ha salido mal',
                                    html:
                                    '<b>Error:</b> ' + xhr.status + " " + xhr.statusText+ '<br>'+
                                    '<b>Mensaje</b> ' + '<br>' +
                                    errorMessage,
                                    type: 'error',
                                    confirmButtonClass: "btn btn-info btn-fill",
                                    buttonsStyling: false
                                });
                            }
                        });

                    }
                });

            },
            password_change: function(){
                var _this = this;
                this.$validator.validateAll("password_change").then(result => {
                    if (result) {
                        var token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            context: this,
                            type: "put",
                            url: "/User/Update/Password",
                            dataType: 'json',
                            data: {
                                _token: token,
                                password_change: _this.informacion.password_change,
                            },
                            success: function(result) {
                                swal({
                                    title: result.estado,
                                    text: result.mensaje,
                                    type: result.tipo,
                                    confirmButtonClass: "btn btn-success btn-fill",
                                    buttonsStyling: false
                                });
                            },
                            error: function(xhr) {
                                var errorMessage = '';
                                jQuery.each(xhr.responseJSON, function(i, val) {
                                    errorMessage += " - " + val + "<br>";
                                });
                                swal({
                                    title: 'Oh no, algo ha salido mal',
                                    html:
                                    '<b>Error:</b> ' + xhr.status + " " + xhr.statusText+ '<br>'+
                                    '<b>Mensaje</b> ' + '<br>' +
                                    errorMessage,
                                    type: 'error',
                                    confirmButtonClass: "btn btn-info btn-fill",
                                    buttonsStyling: false
                                });
                            }
                        });

                    } else {
                        swal({
                            title: "¡Error!",
                            text: "No puedes guardar una contraseña vacia",
                            type: 'error',
                            confirmButtonClass: "btn btn-success btn-fill",
                            buttonsStyling: false
                        });
                    }
                });
            },
            country_change: function() {
                var _this = this;
                this.$validator.validateAll("paises").then(result => {
                    if (result) {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            context: this,
                            type: "put",
                            url: "/User/Update/Country",
                            dataType: 'json',
                            data: {
                                _token: token,
                                pais: _this.informacion.pais,
                                user_id: _this.informacion.admin.roles.user_id,
                            },
                            success: function(result) {
                                swal({
                                    title: result.estado,
                                    text: result.mensaje,
                                    type: result.tipo,
                                    confirmButtonClass: "btn btn-success btn-fill",
                                    buttonsStyling: false
                                });
                            },
                            error: function(xhr) {
                                var errorMessage = '';
                                jQuery.each(xhr.responseJSON, function(i, val) {
                                    errorMessage += " - " + val + "<br>";
                                });
                                swal({
                                    title: 'Oh no, algo ha salido mal',
                                    html:
                                    '<b>Error:</b> ' + xhr.status + " " + xhr.statusText+ '<br>'+
                                    '<b>Mensaje</b> ' + '<br>' +
                                    errorMessage,
                                    type: 'error',
                                    confirmButtonClass: "btn btn-info btn-fill",
                                    buttonsStyling: false
                                });
                            }
                        });

                    } else {
                        swal({
                            title: "¡Error!",
                            text: "No puedes guardar un pais vacio",
                            type: 'error',
                            confirmButtonClass: "btn btn-success btn-fill",
                            buttonsStyling: false
                        });
                    }
                });
            }
        }
      });
  
    });
  </script>
@endsection