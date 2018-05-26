@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-md-12">
        <form id="nueva-entrada-form" v-cloak data-vv-scope="postData" @submit="postData($event)">
            {{ csrf_field() }}
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Nueva Entrada por desinstalación</h4>
                <p class="category">
                  Por favor ingrese los datos requeridos, una vez llenos presione <strong>Guardar</strong>
                </p>
              </div>
              <div class="card-content">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-horizontal">
                      <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.cliente_id') }">
                        <label class="col-md-4 control-label">Cliente</label>
                        <div class="col-sm-8">
                          <select 
                            class="form-control" 
                            name="cliente_id" 
                            id="cliente_id" 
                            v-model="informacion.cliente_id"
                            v-validate="'required'"
                            >
                              @foreach($clientes as $cliente)
                                  <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.almacen_id') }">
                        <label class="col-md-4 control-label">Almac&eacute;n a Ingresar</label>
                        <div class="col-sm-8">
                          <select 
                            class="form-control" 
                            name="almacen_id" 
                            id="almacen_id" 
                            v-model="informacion.almacen_id"
                            v-validate="'required'"
                            >
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
                      <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.moneda_id') }">
                        <label class="col-md-4 control-label">Moneda</label>
                        <div class="col-sm-8">
                            <v-select
                                :value.sync="informacion.moneda_id" 
                                v-model="informacion.moneda_id"
                                :options="monedas" 
                                id="moneda_id"
                                name="moneda_id"
                                v-validate="'required'"
                            ></v-select>
                        </div>
                      </div>
                      <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.fecha_desinstalación') }">
                        <label class="col-md-4 control-label">Fecha de desinstalación</label>
                        <div class="col-sm-8">
                            <date-picker
                                :config="config"
                                id="fecha_devolucion"
                                class="form-control"
                                name="fecha_devolucion"
                                v-model="informacion.fecha_devolucion"
                                v-validate="'required'"
                                >
                            </date-picker>
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
                        Detalles de la desinstalación
                    </h4>
                    <div class="card-content" >
                        <table class="table">
                            <thead>
                                <tr role="row">
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
                                <tr role="row" v-for="(row, index) in rows" :key="index">
                                    <td>
                                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_articulo-' + index) }">
                                            <select
                                                class="form-control"
                                                v-model="row.articulo"
                                                v-on:change="getUnidadesMedida(row.articulo)"
                                                :name="'row_articulo-' + index"
                                                :id="'row_articulo-' + index"
                                                v-validate="'required'"
                                                >
                                                @foreach($articulos as $articulo)
                                                    <option  value="{{ $articulo->id }}">{{ $articulo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_cantidad-' + index) }">
                                            <div class="input-group" >
                                                <span class="input-group-addon">@{{ unidadDeMedida }}</span>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    number="true"
                                                    :name="'row_cantidad-' + index"
                                                    :id="'row_cantidad-' + index"
                                                    v-model="row.cantidad"
                                                    number
                                                    v-validate="'required|numeric'"
                                                >
                                            </div>                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_costo-' + index) }">
                                            <div class="input-group" >
                                                <span class="input-group-addon">@{{ informacion.moneda_id.id }}</span>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    number="true"
                                                    :name="'row_costo-' + index"
                                                    :id="'row_costo-' + index"
                                                    v-model="row.costo"
                                                    number
                                                    v-validate="'required|numeric'"
                                                >
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_serie-' + index) }">
                                            <input
                                                type="text"
                                                class="form-control"
                                                :name="'row_serie-' + index"
                                                :id="'row_serie-' + index"
                                                v-model="row.serie"
                                                v-validate="'required'"
                                            >
                                        </div>
                                    </td>
                                    <td>
                                        <div v-bind:class="{'form-group': true, 'has-error': errors.has('postData.row_lote-' + index) }">
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-validate="'required'"
                                                :name="'row_lote-' + index"
                                                :id="'row_lote-' + index"
                                                v-model="row.lote"
                                            >
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                class="form-control text-right"
                                                v-bind:name="rowTotal(row)"
                                                v-model="row.subtotal"
                                                :name="'row_subtotal-' + index"
                                                :id="'row_subtotal-' + index"
                                                readonly 
                                            />
                                        </div>
                                    </td>
                                    <td data-name="del" class="text-right td-actions">
                                        <div class="form-group">
                                            <a
                                                rel="tooltip"
                                                class="btn btn-success btn-xs"
                                                data-original-title="Añadir"
                                                @click="addRow(index)"
                                            >
                                                <i class="ti-plus"></i>
                                            </a>
                                            <a
                                                    rel="tooltip"
                                                    class="btn btn-danger btn-xs"
                                                    data-original-title="Eliminar"
                                                    @click="removeRow(index)"
                                            >
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
                            <div class="card-content">
                                <div class="col-md-3 col-md-offset-9">
                                    <div class="col-md-4">
                                        <h5 class="text-right">Total:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input
                                                class="form-control text-right"
                                                :value="total()"
                                                v-model="informacion.total"
                                                number
                                                :name="total"
                                                :id="informacion.total"
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
                                    <button type="reset" class="btn btn-fill btn-danger btn-magnify" id="reset">
                                        <span class="btn-label">
                                          <i class="ti-trash"></i>
                                      </span>
                                        Limpiar
                                    </button>
                                    <button type="submit" class="btn btn-fill btn-info btn-magnify" id="submit" :disabled="errors.any()">
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
                config: {
                    format: 'YYYY-MM-DD',
                    useCurrent: true,
                    showClear: true,
                    showClose: true,
                },
                monedas: [
                    @foreach($monedas as $moneda)
                    {label: "{{ $moneda->nombre }} - {{ $moneda->sigla }}", value: "{{ $moneda->id }}", id: "{{ $moneda->sigla }}"},
                    @endforeach
                ],
                unidadDeMedida: "",
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
                    total: "0",
                    notas: "",
                    cliente_id: "",
                    almacen_id: "",
                    moneda_id: "",
                    fecha_devolucion: "",
                }
            },
            methods: {
                getUnidadesMedida: function(id) {
                    if(id) {
                        var _this = this;
                        var token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            context: this,
                            type: "GET",
                            url: "/Articulo/" + id + "/UnidadesMedida",
                            dataType: 'json',
                            data: {
                            _token: token,
                            },
                            success: function(result) {
                                Vue.set(_this, 'unidadDeMedida', result);
                                //_this.productos = result;
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
                            }
                        });
                    }
                },
                rowTotal: function(row) {
                    row.subtotal =  row.cantidad * row.costo;
                    var t = 0;
                    $.each(this.rows, function (i, e) {
                        t += e.subtotal;
                    });
                    this.informacion.total = t;
                },
                total: function () {
                    var t = 0;
                    $.each(this.rows, function (i, e) {
                        t += e.subtotal;
                    });
                    this.informacion.total = t;
                },
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
                postData: function (event) {
                    var _this = this;
                    event.preventDefault();
                    this.$validator.validateAll("postData").then(result => {
                        if (result) {
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
                                    });
                                    location.reload();
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
                }
            }
        });

    });
</script>
@endsection
