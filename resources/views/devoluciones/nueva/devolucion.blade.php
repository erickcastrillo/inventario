@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-md-12">
        <form id="nueva-entrada-form">
            {{ csrf_field() }}
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Nueva Entrada por Devolucion</h4>
                <p class="category">
                  Por favor ingrese los datos requeridos, una vez llenos presione <strong>Guardar</strong>
                </p>
              </div>
              <div class="card-content">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-4 control-label">Cliente</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="cliente_id" id="cliente_id" required title="Debe seleccionar un Cliente" v-model="informacion.cliente_id">
                              <option disabled selected value="">-Seleccione-</option>
                              @foreach($clientes as $cliente)
                                  <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Almacen a Ingresar</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="almacen_id" id="almacen_id" required title="Debe seleccionar una Moneda" v-model="informacion.almacen_id">
                              <option selected value="">-Seleccione-</option>
                              @foreach($almacenes as $almacenes)
                                  <option value="{{ $almacenes->id }}">{{ $almacenes->descripcion }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-4 control-label">Moneda</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="moneda_id" id="moneda_id" required title="Debe seleccionar una Moneda" v-model="informacion.moneda_id">
                              <option selected value="">-Seleccione-</option>
                              @foreach($monedas as $moneda)
                                  <option value="{{ $moneda->id }}">{{ $moneda->nombre }} - {{ $moneda->sigla }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Fecha de Devolución</label>
                        <div class="col-sm-8">
                          <input
                                  type="text"
                                  id="fecha_devolucion"
                                  class="form-control datetimepicker"
                                  name="fecha_devolucion"
                                  required
                                  title="Debe seleccionar una Fecha valida"
                                  v-model="informacion.fecha_devolucion"
                          >
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
                        Detalles de la Devolucion
                    </h4>
                    <div class="card-content" >
                        <table class="table">
                            <thead>
                                <tr role="row">
                                    <th scope="col">No.</th>
                                    <th scope="col">Artículo</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Costo unitario</th>
                                    <th scope="col">Serie</th>
                                    <th scope="col">Lote</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="td-actions text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody v-sortable.tr="rows">
                                <tr role="row" v-for="row in rows" track-by="$index">
                                    <td>
                                        @{{ $index +1 }}
                                    </td>
                                    <td>
                                        <select
                                                class="form-control"
                                                v-model="row.articulo"
                                                required
                                                :name="'row_articulo-' + $index"
                                                :id="'row_articulo-' + $index"
                                                title="Debe seleccionar un Articulo valido">
                                            <option selected value="">-Seleccione-</option>
                                            @foreach($articulos as $articulo)
                                                <option  value="{{ $articulo->id }}">{{ $articulo->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                number="true"
                                                required
                                                :name="'row_cantidad-' + $index"
                                                :id="'row_cantidad-' + $index"
                                                title="Debe ingresar un numero valido"
                                                v-model="row.cantidad"
                                                number
                                        >
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                number="true"
                                                required
                                                :name="'row_costo-' + $index"
                                                :id="'row_costo-' + $index"
                                                title="Debe ingresar un numero valido"
                                                v-model="row.costo"
                                                data-type="currency"
                                                number
                                        >
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                number="true"
                                                required
                                                :name="'row_serie-' + $index"
                                                :id="'row_serie-' + $index"
                                                title="Debe ingresar un numero valido"
                                                v-model="row.serie"
                                                number
                                        >
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                number="true"
                                                required
                                                :name="'row_lote-' + $index"
                                                :id="'row_lote-' + $index"
                                                title="Debe ingresar un numero valido"
                                                v-model="row.lote"
                                                number
                                        >
                                    </td>
                                    <td>
                                        <input
                                                class="form-control text-right"
                                                :value="row.cantidad * row.costo | currencyDisplay"
                                                v-model="row.total | currencyDisplay"
                                                number
                                                :name="'row_total-' + $index"
                                                :id="'row_total-' + $index"
                                                readonly />
                                    </td>
                                    <td data-name="del" class="text-right td-actions">
                                        <a
                                                rel="tooltip"
                                                class="btn btn-success btn-simple btn-xs"
                                                data-original-title="Añadir"
                                                @click="addRow($index)"
                                        >
                                            <i class="ti-plus"></i>
                                            Añadir
                                        </a>
                                        <a
                                                rel="tooltip"
                                                class="btn btn-danger btn-simple btn-xs"
                                                data-original-title="Borrar"
                                                @click="removeRow($index)"
                                        >
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
                            <div class="card-content">
                                <div class="col-md-3 col-md-offset-9">
                                    <div class="col-md-4">
                                        <h5 class="text-right">Total:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input
                                                class="form-control text-right"
                                                :value="total | currencyDisplay"
                                                v-model="informacion.grand_total | currencyDisplay"
                                                number
                                                :name="grand_total"
                                                :id="informacion.grand_total"
                                                readonly />
                                    </div>

                                </div>
                            </div>
                        </div>
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
                                    <button
                                            type="reset"
                                            class="btn btn-fill btn-danger btn-magnify"
                                            id="reset"
                                    >
                                        <span class="btn-label">
                                          <i class="ti-trash"></i>
                                      </span>
                                        Limpiar
                                    </button>
                                    <button

                                            class="btn btn-fill btn-info btn-magnify" @click="postData()"
                                            id="submit"
                                    >
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

        Vue.filter('currencyDisplay', {
            // model -> view
            read: function (val) {
                if (val > 0) {
                    return accounting.formatMoney(val, "{{ Auth::user()->get_moneda()->first()->sigla}}", 2, ".", ",");
                }
            },
            // view -> model
            write: function (val, oldVal) {
                return accounting.unformat(val, ",");
            }
        });

        Vue.directive('sortable', {
            twoWay: true,
            deep: true,
            bind: function () {
                var that = this;

                var options = {
                    draggable: Object.keys(this.modifiers)[0]
                };

                this.sortable = Sortable.create(this.el, options);
                console.log('sortable bound!')

                this.sortable.option("onUpdate", function (e) {
                    that.value.splice(e.newIndex, 0, that.value.splice(e.oldIndex, 1)[0]);
                });

                this.onUpdate = function(value) {
                    that.value = value;
                }
            },
            update: function (value) {
                this.onUpdate(value);
            }
        });

        var vm = new Vue({
            el: '#app',
            data: {
                rows: [
                    //initial data
                    {
                        articulo: "",
                        cantidad: "",
                        costo: "",
                        serie: "",
                        lote: ""
                    },

                ],
                informacion: {
                    grand_total: "0",
                    notas: "",
                    cliente_id: "",
                    almacen_id: "",
                    moneda_id: "",
                    fecha_devolucion: "",
                }
            },
            computed: {
                total: function () {
                    var t = 0;
                    $.each(this.rows, function (i, e) {
                        t += accounting.unformat(e.total, ",");
                    });
                    return t;
                },
            },
            methods: {
                addRow: function (index) {
                    try {
                        this.rows.splice(index + 1, 0, {});
                    } catch(e)
                    {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: e,
                            confirmButtonClass: "btn btn-success btn-fill",
                            buttonsStyling: false
                        });
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
                            confirmButtonClass: "btn btn-success btn-fill",
                            buttonsStyling: false
                        })
                    }
                },
                postData: function () {
                    var _this = this;
                    $('#nueva-entrada-form').validate(
                        {
                            submitHandler: function(form) {
                                // some other code
                                // maybe disabling submit button
                                // then:
                                $('#submit').addClass('disabled');
                                var token = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    context: this,
                                    type: "POST",
                                    url: "/Devolucion",
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
                                            location.reload();
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
                        }
                    );

                }
            }
        });

        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD H:mm:ss',    //use this format if you want the 12hours timpiecker with AM/PM toggle
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
