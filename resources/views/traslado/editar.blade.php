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
                        <select class="form-control" name="movimiento_id" id="movimiento_id" data-vv-as="Movimiento" v-validate="'required'" v-model="informacion.movimiento_id">
                          @foreach($movimientos as $movimiento)
                          <option value="{{ $movimiento->id }}">{{ $movimiento->nombre }}</option>
                          @endforeach
                        </select>
                        <span class="text-danger">@{{ errors.first('postData.movimiento_id') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Almac&eacute;n</label>
                      <div class="col-sm-8">
                        <select v-on:change="getProductos()" class="form-control" name="almacen_id" id="almacen_id" v-model="informacion.almacen_id">
                          <option disabled selected value="">-Seleccione-</option>
                          <!-- Todo - mostrar Almacen principal -->
                          @foreach($almacenes as $almacenes)
                          <option value="{{ $almacenes->id }}">{{ $almacenes->descripcion }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Departamento</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="departamento_id" id="departamento_id" v-model="informacion.departamento_id">
                          <option selected value="">-Seleccione-</option>
                          @foreach($departamentos as $departamento)
                          <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h4 class="card-title text-center">Datos de Retiro</h4>
                  <div class="form-horizontal">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Fecha</label>
                      <div class="col-sm-8">
                        <date-picker :config="datepicker" id="fecha_retiro" class="form-control" name="fecha_retiro" v-model="informacion.fecha_retiro"
                          :value="moment().format('YYYY-MM-DD')"> </date-picker>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Hora</label>
                      <div class="col-sm-8">
                        <date-picker :config="timepicker" id="hora_retiro" class="form-control" name="hora_retiro" :value="moment().format('h:mm: A')"
                          v-model="informacion.hora_retiro"> </date-picker>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Nombre Completo</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre_retira" id="nombre_retira" v-model="informacion.nombre_retira">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">No de Indentificación</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_personal_retira" id="id_personal_retira" number="true" v-model="informacion.id_personal_retira">
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
                      <th scope="col">No.</th>
                      <th scope="col">Artículo</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col" class="td-actions text-right">Acciones</th>
                    </tr>
                  </thead>
                  <tbody v-sortable.tr="rows">
                    <tr role="row" v-for="(row, index) in rows" :key="index">
                      <td>
                        @{{ index +1 }}
                      </td>
                      <td>
                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('admin_roles.roles_usuario_editar') }">
                          <div class="input-group">
                            <select class="form-control" v-model="row.articulo" :name="'row_articulo-' + index" :id="'row_articulo-' + index">
                              <option disabled selected value="">-Seleccione-</option>
                              <option v-for="producto in productos" :value="producto.articulo_id">
                                @{{ producto.nombre_producto }}
                              </option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('admin_roles.roles_usuario_editar') }">
                          <div class="input-group">
                            <span class="input-group-addon">Maximo @{{ row.cantidad_maxima }}</span>
                            <input type="text" class="form-control" number="true" v-bind:max='row.cantidad_maxima' :name="'row_cantidad-' + index" :id="'row_cantidad-' + index"
                              v-model="row.cantidad" number>
                          </div>
                        </div>
                      </td>
                      <td data-name="del" class="text-right td-actions">
                        <a rel="tooltip" class="btn btn-success btn-simple btn-xs" data-original-title="Añadir" @click="addRow(index)">
                          <i class="ti-plus"></i>
                          Añadir
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-simple btn-xs" data-original-title="Borrar" @click="removeRow(index)">
                          <i class="ti-close"></i>
                          Borrar
                        </a>
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
                      <button class="btn btn-fill btn-info btn-magnify" type="submit" id="submit">
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
          format: 'h:mm: A',
          useCurrent: true,
          showClear: true,
          showClose: true,
        },
        productos: [{
          id: "",
          almacen_id: "",
          articulo_id: "",
          nombre_producto: ""
        }],
        informacion: {
          notas: "",
          almacen_id: "",
          movimiento_id,
          motivo: "",
          departamento_id: "",
          fecha_retiro: "",
          hora_retiro: "",
          nombre_retira: "",
          id_personal_retira: ""
        },
        rows: [{
          articulo: "",
          cantidad: "",
          cantidad_maxima: 0,
        }, ],
        postData: {

        }
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
          this.$validator.validateAll("traslado").then(result => {
            if (result) {
              var token = $('meta[name="csrf-token"]').attr('content');

              $.ajax({
                context: this,
                type: "POST",
                url: "/Traslado",
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
        },
      }
    });

  });
</script>
@endsection