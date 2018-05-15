@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-md-12">
        <form id="nueva-traslado-form">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Solicitud de traslado</h4>
              <p class="category">
                Por favor ingrese los datos requeridos, una vez llenos presione <strong>Guardar</strong>
              </p>
            </div>
            <div class="card-content">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title text-center">Detalle del Traslado</h4>
                  <div class="form-horizontal">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Almacen</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="almacen_id_entrada" id="almacen_id_entrada" required title="Debe seleccionar una Almacen" v-model="informacion.almacen_id_entrada">
                            <option disabled selected value="">-Seleccione-</option>
                            @foreach($almacenes_propias as $almacenes_propia)
                                <option value="{{ $almacenes_propia->id }}">{{ $almacenes_propia->descripcion }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Almacen principal</label>
                      <div class="col-sm-8">
                        <select v-on:change="getProductos()" class="form-control" name="almacen_id_salida" id="almacen_id_salida" required title="Debe seleccionar una Almacen" v-model="informacion.almacen_id_salida">
                            <option disabled selected value="">-Seleccione-</option>
                            <!-- Todo - mostrar Almacen principal -->
                            @foreach($almacenes as $almacenes)
                                <option value="{{ $almacenes->id }}">{{ $almacenes->descripcion }} </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Motivo</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="movimiento_id" id="movimiento_id" required title="Debe seleccionar una Motivo" v-model="informacion.movimiento_id">
                            <option disabled selected value="">-Seleccione-</option>
                            <!-- Movivientos por pais de la persona logueada -->
                            @foreach($movimientos as $movimiento)
                                <option value="{{ $movimiento->id }}">{{ $movimiento->nombre }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Departamento</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="departamento_id" id="departamento_id" required title="Debe seleccionar un Departamento" v-model="informacion.departamento_id">
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
                        <input type="text" id="fecha_retiro" class="form-control datepicker" name="fecha_retiro" required title="Debe seleccionar una Fecha valida" v-model="informacion.fecha_retiro">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Hora</label>
                      <div class="col-sm-8">
                        <input type="text" id="hora_retiro" class="form-control timepicker" name="hora_retiro" required title="Debe seleccionar una Hora valida" v-model="informacion.hora_retiro">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Nombre Completo</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre_retira" id="nombre_retira" required title="Debe ingresar un nombre" v-model="informacion.nombre_retira">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">No de Indentificación</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_personal_retira" id="id_personal_retira" number="true" required title="Debe ingresar un ID valido" v-model="informacion.id_personal_retira">
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
                      <th scope="col">Lote</th>
                      <th scope="col">Serie</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col" class="hidden">Costo unitario</th>
                      <th scope="col" class="td-actions text-right">Acciones</th>
                    </tr>
                  </thead>
                  <tbody v-sortable.tr="rows">
                    <tr  role="row" v-for="(row, index) in rows" :key="index">
                      <td>
                        @{{ index +1 }}
                      </td>
                      <td>
                        <select v-on:change="getLotes(row)" class="form-control" v-model="row.articulo" required :name="'row_articulo-' + index" :id="'row_articulo-' + index" title="Debe seleccionar un Articulo valido">
                            <option disabled selected value="">-Seleccione-</option>
                            <option v-for="producto in productos"
                              :value="producto.articulo_id">
                              @{{ producto.nombre_producto }}
                            </option>
                        </select>
                      </td>
                      <td>
                        <select v-on:change="getSerie(row)" class="form-control" v-model="row.lote" required :name="'row_lote-' + index" :id="'row_lote-' + index" title="Debe seleccionar un Articulo valido">
                            <option disabled selected value="">-Seleccione-</option>
                            <option v-for="lote in row.lotes"
                              :id="lote.articulo_id" >
                              @{{ lote.lote }}
                            </option>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" v-model="row.serie" required :name="'row_serie-' + index" :id="'row_serie-' + index" title="Debe seleccionar un Articulo valido">
                            <option disabled selected value="">-Seleccione-</option>
                            <option v-for="serie in row.series"
                              :id="serie.articulo_id" >
                              @{{ serie.serie }}
                            </option>
                        </select>
                      </td>
                      <td>
                        <input type="text" class="form-control" number="true" required :name="'row_cantidad-' + index" :id="'row_cantidad-' + index" title="Debe ingresar un numero valido" v-model="row.cantidad" number>
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
                      <button class="btn btn-fill btn-info btn-magnify" @click="postData()" id="submit">
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
  $(document).ready(function() {

    Vue.directive('sortable', {
      twoWay: true,
      deep: true,
      bind: function() {
        var that = this;

        var options = {
          draggable: Object.keys(this.modifiers)[0]
        };

        this.sortable = Sortable.create(this.el, options);

        this.sortable.option("onUpdate", function(e) {
          that.value.splice(e.newIndex, 0, that.value.splice(e.oldIndex, 1)[0]);
        });

        this.onUpdate = function(value) {
          that.value = value;
        }
      },
      update: function(value) {
        this.onUpdate(value);
      }
    });

    var vm = new Vue({
      el: '#app',
      data: {
        //initial data
        productos: [
          {
            id: "",
            almacen_id: "",
            articulo_id: "",
            nombre_producto: ""
            }
        ],
        rows: [
          {
            articulo: "",
            serie: "",
            lote: "",
            cantidad: "",
            series: [
              {
                id: "",
                articulo_id: "",
                serie: ""
              }
            ],
            lotes: [
              {
                id: "",
                articulo_id: "",
                lote: "",
              }
            ],
          },
        ],
        informacion: {
          notas: "",
          almacen_id_entrada: "",
          almacen_id_salida: "",
          motivo: "",
          departamento_id: "",
          fecha_retiro: "",
          hora_retiro: "",
          nombre_retira: "",
          id_personal_retira: ""
        }
      },
      methods: {
        addRow: function(index) {
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
        removeRow: function(index) {
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
        postData: function() {
          var _this = this;
          $('#nueva-traslado-form').validate({
            submitHandler: function(form) {
              $('#submit').addClass('disabled');
              _this.informacion.hora_retiro = moment(_this.informacion.hora_retiro, 'h:mm a').format('H:mm:ss');
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
                  success: function(result) {
                      swal({
                          title: result.estado,
                          text: result.mensaje,
                          type: result.tipo,
                          confirmButtonClass: "btn btn-success btn-fill",
                          buttonsStyling: false
                      }).then(function() {
                          //location.reload();
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
                      $('#submit').removeClass('disabled');
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
            url: "/Almacen/" + _this.informacion.almacen_id_salida + "/detalles",
            dataType: 'json',
            data: {
              _token: token,
            },
            success: function(result) {
                _this.productos = result;
            },
            error: function(xhr) {
              var errorMessage = '';
              jQuery.each(xhr.responseJSON, function(i, val) {
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
        getLotes: function (row) {
          var _this = this;
          var token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            context: this,
            type: "GET",
            url: "/Almacen/" + _this.informacion.almacen_id_salida + "/" + row.articulo + "/lotes",
            dataType: 'json',
            data: {
              _token: token,
            },
            success: function(result) {
                Vue.set(row, 'lotes', result);
            },
            error: function(xhr) {
              var errorMessage = '';
              jQuery.each(xhr.responseJSON, function(i, val) {
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
        getSerie: function (row) {
          var _this = this;
          var token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            context: this,
            type: "GET",
            url: "/Almacen/" + _this.informacion.almacen_id_salida + "/" + row.articulo + "/" + row.lote + "/series",
            dataType: 'json',
            data: {
              _token: token,
            },
            success: function(result) {
                Vue.set(row, 'series', result);
            },
            error: function(xhr) {
              var errorMessage = '';
              jQuery.each(xhr.responseJSON, function(i, val) {
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

    $('.datepicker').datetimepicker({
      format: 'YYYY-DD-MM', //use this format if you want the 12hours timpiecker with AM/PM toggle
      locale: 'es',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });

    $('.timepicker').datetimepicker({
      //          format: 'H:mm',    // use this format if you want the 24hours timepicker
      format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
      locale: 'es',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }

    });

  });
</script>
@endsection
