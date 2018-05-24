@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
  <div class="container-fluid">
    <div class="row" id="app" v-cloak>
      <div class="col-md-12">
        <form @submit.prevent="postData()" data-vv-scope="postData">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Solicitud de traslado</h4>
              <p class="category">
                Por favor ingrese los datos requeridos, una vez llenos presione
                <strong>Guardar</strong>
              </p>
            </div>
            <div class="card-content">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title text-center">Detalle del Traslado</h4>
                  <div class="form-horizontal">
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.movimiento_id') }">
                      <label class="col-md-4 control-label">Movimiento</label>
                      <div class="col-sm-8">
                        <select 
                          class="form-control" 
                          name="movimiento_id" 
                          id="movimiento_id" 
                          v-model="informacion.movimiento_id"
                          v-validate="'required'"
                          data-vv-as="Movimiento"
                          >
                          @foreach($movimientos as $movimiento)
                            <option value="{{ $movimiento->id }}">{{ $movimiento->nombre }}</option>
                          @endforeach
                        </select>
                        <span v-if="errors.has('postData.movimiento_id')">
                            @{{ errors.first('postData.movimiento_id') }}
                        </span>
                      </div>
                    </div>
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.almacen_id') }">
                      <label class="col-md-4 control-label">Almac&eacute;n</label>
                      <div class="col-sm-8">
                        <select
                          class="form-control" 
                          name="almacen_id" 
                          id="almacen_id"
                          v-model="informacion.almacen_id"
                          v-validate="'required'"
                          data-vv-as="Almacen"
                        >
                          @foreach($almacenes as $almacenes)
                            <option value="{{ $almacenes->id }}">{{ $almacenes->descripcion }} </option>
                          @endforeach
                        </select>
                        <span v-if="errors.has('postData.almacen_id')">
                            @{{ errors.first('postData.almacen_id') }}
                        </span>
                      </div>
                    </div>
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.departamento_id') }">
                      <label class="col-md-4 control-label">Departamento</label>
                      <div class="col-sm-8">
                        <select 
                          class="form-control" 
                          name="departamento_id" 
                          id="departamento_id" 
                          v-model="informacion.departamento_id"
                          v-validate="'required'"
                          data-vv-as="Departamento"
                          >
                          @foreach($departamentos as $departamento)
                          <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                          @endforeach
                        </select>
                        <span v-if="errors.has('postData.departamento_id')">
                            @{{ errors.first('postData.departamento_id') }}
                        </span>
                      </div>
                    </div>
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.supervisor_id') }">
                        <label class="col-md-4 control-label">Supervisor</label>
                        <div class="col-sm-8">
                          <select 
                            class="form-control" 
                            name="supervisor_id" 
                            id="supervisor_id" 
                            v-model="informacion.supervisor_id"
                            v-validate="'required'"
                            data-vv-as="Supervisor"
                          >
                              @foreach($supervisores as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->get_full_name() }}</option>
                              @endforeach
                          </select>
                          <span v-if="errors.has('postData.supervisor_id')">
                              @{{ errors.first('postData.supervisor_id') }}
                          </span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h4 class="card-title text-center">Datos de Retiro</h4>
                  <div class="form-horizontal">
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.fecha_retiro') }">
                      <label class="col-md-4 control-label">Fecha</label>
                      <div class="col-sm-8">
                        <date-picker 
                          :config="datepicker" 
                          id="fecha_retiro" 
                          class="form-control" 
                          name="fecha_retiro" 
                          v-model="informacion.fecha_retiro"
                          :value="moment().format('YYYY-MM-DD')"
                          v-validate="'required|date_format:YYYY-MM-DD'"
                          data-vv-as="Fecha retiro"
                        > </date-picker>
                        <span v-if="errors.has('postData.fecha_retiro')">
                            @{{ errors.first('postData.fecha_retiro') }}
                        </span>
                      </div>
                    </div>
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.hora_retiro') }">
                      <label class="col-md-4 control-label">Hora</label>
                      <div class="col-sm-8">
                        <date-picker 
                          :config="timepicker" 
                          id="hora_retiro" 
                          class="form-control" 
                          name="hora_retiro" 
                          :value="moment().format('h:mm A')"
                          v-model="informacion.hora_retiro"
                          v-validate="'required|date_format:h:mm A'"
                          data-vv-as="Hora retiro"
                        > </date-picker>
                        <span v-if="errors.has('postData.hora_retiro')">
                            @{{ errors.first('postData.hora_retiro') }}
                        </span>
                      </div>
                    </div>
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.nombre_retira') }">
                      <label class="col-md-4 control-label">Nombre Completo</label>
                      <div class="col-sm-8">
                        <input 
                          type="text" 
                          class="form-control" 
                          name="nombre_retira" 
                          id="nombre_retira" 
                          v-model="informacion.nombre_retira"
                          v-validate="'required|alpha_spaces'"
                          data-vv-as="Nombre Persona Retira">
                          <span v-if="errors.has('postData.nombre_retira')">
                              @{{ errors.first('postData.nombre_retira') }}
                          </span>
                      </div>
                    </div>
                    <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.id_personal_retira') }">
                      <label class="col-md-4 control-label">No de Identificación</label>
                      <div class="col-sm-8">
                        <input 
                          type="text" 
                          class="form-control" 
                          name="id_personal_retira" 
                          id="id_personal_retira" 
                          placeholder="Ejemplo: 1-2345-6789"
                          v-model="informacion.id_personal_retira"
                          v-validate="'required|regex:^([0-9])-([0-9]{4})-([0-9]{4})$'"
                          data-vv-as="ID Persona Retira">
                          <span v-if="errors.has('postData.id_personal_retira')">
                              @{{ errors.first('postData.id_personal_retira') }}
                          </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                Detalles de la Entrada
              </h4>
              <div class="card-content">
                <table class="table">
                  <thead>
                    <tr role="row">
                      <th scope="col">Artículo</th>
                      <th scope="col" style="width: 100px;" >Cantidad</th>
                      <th scope="col" class="td-actions text-right" style="width: 50px;">Acciones</th>
                    </tr>
                  </thead>
                  <tbody v-sortable.tr="rows">
                    <tr role="row" v-for="(row, index) in rows" :key="index">
                      <td>
                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_articulo-' + index) }">
                          <select 
                            class="form-control" 
                            v-model="row.articulo" 
                            :name="'row_articulo-' + index" 
                            :id="'row_articulo-' + index"
                            v-validate="'required'"
                            data-vv-as="Producto"
                            >
                            @foreach($productos as $producto)
                              <option value="{{$producto->id}}">{{$producto->descripcion}} - {{$producto->codigo}}</option>
                            @endforeach
                          </select>
                          <span v-if="errors.has('postData.row_articulo-' + index)">
                              @{{ errors.first('postData.row_articulo-' + index) }}
                          </span>
                        </div>
                      </td>
                      <td>
                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_cantidad-' + index) }">
                          <input
                            class="form-control" 
                            number="true"
                            type="number"
                            number
                            v-bind:max='row.cantidad_maxima' 
                            :name="'row_cantidad-' + index" 
                            :id="'row_cantidad-' + index"
                            v-model="row.cantidad" 
                            v-validate="'required|numeric'"
                            data-vv-as="Cantidad"
                            >
                            <span v-if="errors.has('postData.row_cantidad-' + index)">
                                @{{ errors.first('postData.row_cantidad-' + index) }}
                            </span>
                        </div>
                      </td>
                      <td data-name="del" class="text-right td-actions">
                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_estado-' + index) }">
                            <a rel="tooltip" class="btn btn-success btn-xs" data-original-title="Añadir" @click="addRow(index)">
                              <i class="ti-plus"></i>
                            </a>
                            <a rel="tooltip" class="btn btn-danger btn-xs" data-original-title="Eliminar" @click="removeRow(index)">
                              <i class="ti-close"></i>
                            </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="row">
                <div class="card card-plain">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="card-content">
                        <label class="col-sm-2 control-label">Notas</label>
                        <div class="col-sm-10">
                          <textarea v-model="informacion.notas" name="notas" id="notas" class="form-control" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-md-offset-9">
                  <div class="card card-plain">
                    <div class="card-content">
                      <button type="reset" class="btn btn-fill btn-danger btn-magnify" id="reset">
                        <span class="btn-label">
                          <i class="ti-trash"></i>
                        </span>
                        Limpiar
                      </button>
                      <button :disabled="errors.any()" class="btn btn-fill btn-info btn-magnify" type="submit" id="submit">
                        <span class="btn-label">
                          <i class="ti-save"></i>
                        </span>
                        Guardar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {

    Vue.component('date-picker', VueBootstrapDatetimePicker.default);
    Vue.component('v-select', VueSelect.VueSelect);
    Vue.use(VeeValidate, {
      locale: 'es',
    });

    var vm = new Vue({
      el: '#app',
      data: {
        date: null,
        datepicker: {
          format: 'YYYY-MM-DD',
          useCurrent: true,
          showClear: true,
          showClose: true,
        },
        timepicker: {
          format: 'h:mm A',
          useCurrent: true,
          showClear: true,
          showClose: true,
        },
        productos: [{
          id: "",
          codigo: "",
          almacen_id: "",
          articulo_id: "",
          nombre_producto: ""
        }],
        informacion: {
          notas: "",
          almacen_id: "",
          movimiento_id: "",
          motivo: "",
          departamento_id: "",
          fecha_retiro: moment().format('YYYY-MM-DD'),
          hora_retiro: moment().format('h:mm A'),
          nombre_retira: "",
          id_personal_retira: "",
          supervisor_id: "",
        },
        rows: [{
          articulo: "",
          almacen_id: "",
          cantidad: "",
          cantidad_maxima: 0,
        }],

      },
      methods: {
        addRow: function (index) {
          try {
            this.rows.splice(index + 1, 0, {});
          } catch (e) {
            swal({
              type: 'error',
              title: 'Oops...',
              text: e,
              confirmButtonClass: "btn btn-info btn-fill",
              buttonsStyling: false
            })
          }
        },
        removeRow: function (index) {
          if (this.rows.length > 1) {
            this.rows.splice(index, 1);
          } else {
            swal({
              type: 'error',
              title: 'Oops...',
              text: '¡No puedes borrar la ultima fila que te queda!',
              confirmButtonClass: "btn btn-info btn-fill",
              buttonsStyling: false
            })
          }
        },
        postData: function () {
          var _this = this;
          this.$validator.validateAll("postData").then(result => {
            if (result) {
              var token = $('meta[name="csrf-token"]').attr('content');

              $.ajax({
                context: this,
                type: "POST",
                url: "/Traslado/Create/Solicitud",
                dataType: 'json',
                data: {
                  _token: token,
                  informacion: _this.informacion,
                  rows: _this.rows,
                },
                success: function (result) {
                  swal({
                    title: result.estado,
                    text: result.mensaje,
                    type: result.tipo,
                    confirmButtonClass: "btn btn-success btn-fill",
                    buttonsStyling: false
                  });
                  location.reload();
                },
                error: function (xhr) {
                  var errorMessage = '';
                  jQuery.each(xhr.responseJSON, function (i, val) {
                    errorMessage += " - " + val + "<br>";
                  });
                  swal({
                    title: 'Oh no, algo ha salido mal',
                    html: '<b>Error:</b> ' + xhr.status + " " + xhr.statusText + '<br>' +
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
        getProductos: function () {
          var _this = this;
          var token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            context: this,
            type: "GET",
            url: "/Almacen/" + _this.informacion.almacen_id + "/detalles",
            dataType: 'json',
            data: {
              _token: token,
            },
            success: function (result) {
              Vue.set(_this, 'productos', result);
            },
            error: function (xhr) {
              var errorMessage = '';
              jQuery.each(xhr.responseJSON, function (i, val) {
                errorMessage += " - " + val + "<br>";
              });
              swal({
                title: 'Oh no, algo ha salido mal',
                html: '<b>Error:</b> ' + xhr.status + " " + xhr.statusText + '<br>' +
                  '<b>Mensaje</b> ' + '<br>' +
                  errorMessage,
                type: 'error',
                confirmButtonClass: "btn btn-info btn-fill",
                buttonsStyling: false
              });
              $('#submit').removeClass('disabled');
            }
          });
        }
      }
    });

  });
</script>
@endsection