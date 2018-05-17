@extends('layouts.master')
@section('content')
    @include('layouts.flashes')
    <div class="content">
        <div class="container-fluid">
            <div class="row" id="app">
                <div class="col-md-12">
                    <form id="nueva-entrada-form" @submit="postData($event)" v-cloak>
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nueva Entrada por Compra</h4>
                                <p class="category">
                                    Por favor ingrese los datos requeridos, una vez llenos presione <strong>Guardar</strong>
                                </p>
                            </div>
                            <div class="card-content" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Proveedor</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                            :class="{'form-control': true, 'error': errors.first('id_proveedor')}"
                                                            name="id_proveedor"
                                                            id="id_proveedor"
                                                            required
                                                            v-validate="'required'"
                                                            v-model="informacion.id_proveedor"
                                                        >
                                                            <option disabled="" selected="" value="">-Seleccione-</option>  
                                                            @foreach($proveedores as $proveedor)
                                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  >@{{ errors.first('id_proveedor') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">No. Factura</label>
                                                    <div class="col-sm-8">
                                                        <input
                                                            type="text"
                                                            :class="{'form-control': true, 'error': errors.first('n_factura')}"
                                                            name="n_factura"
                                                            id="n_factura"
                                                            number="true"
                                                            required
                                                            v-validate="'required|decimal'"
                                                            v-model="informacion.n_factura"
                                                        >
                                                        <span  >@{{ errors.first('n_factura') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Fecha Factura</label>
                                                    <div class="col-sm-8">
                                                        <date-picker
                                                            :config="config"
                                                            id="fecha_factura"
                                                            :class="{'form-control datetimepicker': true, 'error': errors.first('fecha_factura')}"
                                                            name="fecha_factura"
                                                            required
                                                            v-model="informacion.fecha_factura"
                                                            v-validate="'required|date_format:YYYY-MM-DD'"
                                                            >
                                                        </date-picker>
                                                        <span >@{{ errors.first('fecha_factura') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Moneda</label>
                                                    <div class="col-sm-8">
                                                        <v-select  
                                                            :value.sync="informacion.moneda_id" 
                                                            v-model="informacion.moneda_id"
                                                            :class="{'error': errors.first('n_factura')}"
                                                            :options="monedas" 
                                                            id="moneda_id"
                                                            name="moneda_id"
                                                            v-validate="'required'"
                                                            required
                                                            ></v-select>
                                                        <span  >@{{ errors.first('moneda_id') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Proyecto</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                            :class="{'form-control': true, 'error': errors.first('proyecto_id')}"
                                                            name="proyecto_id"
                                                            id="proyecto_id"
                                                            required
                                                            v-model="informacion.proyecto_id"
                                                            v-validate="'required'"
                                                        >
                                                            <option disabled="" selected="" value="">-Seleccione-</option>
                                                            @foreach($proyectos as $proyecto)
                                                                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  >@{{ errors.first('proyecto_id') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Tarea</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                            :class="{'form-control': true, 'error': errors.first('proyecto_id')}"
                                                            name="tarea_id"
                                                            id="tarea_id"
                                                            required
                                                            v-model="informacion.tarea_id"
                                                            v-validate="'required'"
                                                        >
                                                            <option disabled="" selected="" value="">-Seleccione-</option>  
                                                            @foreach($tareas as $tarea)
                                                                <option value="{{ $tarea->id }}">{{ $tarea->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  >@{{ errors.first('tarea_id') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Tipo / Concepto</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                            :class="{'form-control': true, 'error': errors.first('tipo_concepto_id')}"
                                                            name="tipo_concepto_id"
                                                            id="tipo_concepto_id"
                                                            required
                                                            v-model="informacion.tipo_concepto_id"
                                                            v-validate="'required'"
                                                        >
                                                            <option disabled="" selected="" value="">-Seleccione-</option>
                                                            @foreach($tiposconcepto as $tipoconcepto)
                                                                <option value="{{ $tipoconcepto->id }}">{{ $tipoconcepto->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  >@{{ errors.first('tipo_concepto_id') }}</span>
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
                                            <tr role="row" v-for="(row, index) in rows" :key="index">
                                                <td>
                                                    @{{ index + 1 }}
                                                </td>
                                                <td>
                                                    <div class="input-group" >
                                                        <select
                                                            {{-- :class="{'form-control': true, 'error': errors.first(\"'row_articulo-' + index\")}" --}}
                                                            class="form-control"
                                                            v-on:change="getUnidadesMedida(row.articulo)"
                                                            v-model="row.articulo"
                                                            required
                                                            v-validate="'required'"
                                                            :name="'row_articulo-' + index"
                                                            :id="'row_articulo-' + index"
                                                            v-validate="'required'"
                                                        >
                                                            <option disabled="" selected="" value="">-Seleccione-</option>
                                                            @foreach($articulos as $articulo)
                                                                <option  value="{{ $articulo->id }}">{{ $articulo->descripcion }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  >@{{ errors.first('row.articulo') }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group" >
                                                        <span class="input-group-addon">@{{ unidadDeMedida }}</span>
                                                        <input
                                                            type="text"
                                                            {{-- :class='{"form-control": true, "error": errors.first("\'row_cantidad-\' + index")}' --}}
                                                            class="form-control"
                                                            number="true"
                                                            required
                                                            v-on:change="rowTotal(row)"
                                                            :name="'row_cantidad-' + index"
                                                            :id="'row_cantidad-' + index"
                                                            v-model="row.cantidad"
                                                            number
                                                            v-validate="'required|decimal'"
                                                        >
                                                        <span  >@{{ errors.first('row.cantidad') }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group" >
                                                        <span class="input-group-addon">@{{ informacion.moneda_id.id }}</span>
                                                        <input
                                                            type="text"
                                                            {{-- :class='{"form-control": true, "error": errors.first("\'row_costo-\' + index")}' --}}
                                                            class="form-control"
                                                            number="true"
                                                            v-on:change="rowTotal(row)"
                                                            required
                                                            :name="'row_costo-' + index"
                                                            :id="'row_costo-' + index"
                                                            v-model="row.costo"
                                                            number
                                                            v-validate="'required|decimal'"
                                                        >
                                                        <span  >@{{ errors.first('row.costo') }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input
                                                            type="text"
                                                            {{-- :class='{"form-control": true, "error": errors.first("\'row_serie-\' + index")}' --}}
                                                            class="form-control"
                                                            number="true"
                                                            required
                                                            :name="'row_serie-' + index"
                                                            :id="'row_serie-' + index"
                                                            v-model="row.serie"
                                                            number
                                                            v-validate="'required'"
                                                        >
                                                        <span  >@{{ errors.first('row.serie') }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group" >
                                                        <input
                                                            type="text"
                                                            {{-- :class='{"form-control": true, "error": errors.first("\'row_lote-\' + index")}' --}}
                                                            class="form-control"
                                                            number="true"
                                                            required
                                                            :name="'row_lote-' + index"
                                                            :id="'row_lote-' + index"
                                                            v-model="row.lote"
                                                            number
                                                            v-validate="'required'"
                                                        >
                                                        <span  >@{{ errors.first('row.lote') }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" disabled>@{{ informacion.moneda_id.id }}</span>
                                                        <input
                                                            class="form-control text-right"
                                                            v-bind:name="rowTotal(row)"
                                                            v-model="row.subtotal"
                                                            number
                                                            :name="'row_subtotal-' + index"
                                                            :id="'row_subtotal-' + index"
                                                            readonly 
                                                        >    
                                                    </div>

                                                </td>
                                                <td data-name="del" class="text-right td-actions">
                                                    <a
                                                        rel="tooltip"
                                                        class="btn btn-success btn-simple btn-xs"
                                                        data-original-title="Añadir"
                                                        @click="addRow(index)"
                                                    >
                                                    <i class="ti-plus"></i>
                                                    Añadir
                                                    </a>
                                                    <a
                                                        rel="tooltip"
                                                        class="btn btn-danger btn-simple btn-xs"
                                                        data-original-title="Borrar"
                                                        @click="removeRow(index)"
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
                                                        :value="total()"
                                                        v-model="informacion.total"
                                                        number
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
                                                        <textarea 
                                                        v-model="informacion.notas" 
                                                        name="notas" 
                                                        id="notas" 
                                                        :class="{'form-control': true, 'error': errors.first('notas')}"
                                                        v-validate="'required'"
                                                        rows="3"></textarea>
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
                                                <button class="btn btn-fill btn-info btn-magnify" type="submit">
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

            Vue.component('v-select', VueSelect.VueSelect);

            Vue.component('date-picker', VueBootstrapDatetimePicker.default);

            Vue.use(VeeValidate);            

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
                            lote: "",
                            subtotal: ""
                        },

                    ],
                    informacion: {
                        total: "",
                        notas: "",
                        id_proveedor: "",
                        moneda_id: "",
                        proyecto_id: "",
                        tarea_id: "",
                        tipo_concepto_id: "",
                        n_factura: "",
                        fecha_factura: ""
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
                    resetData: function() {
                        this.informacion = {
                            total: "0",
                            notas: "",
                            id_proveedor: "",
                            moneda_id: "",
                            proyecto_id: "",
                            tarea_id: "",
                            tipo_concepto_id: "",
                            n_factura: "",
                            fecha_factura: ""
                        };
                        this.rows = [
                            //initial data
                            {
                                articulo: "",
                                cantidad: "",
                                costo: "",
                                serie: "",
                                lote: ""
                            },

                        ];
                    },
                    addRow: function (index) {
                        try {
                            this.rows.splice(index + 1, 0, {});
                        } catch(e)
                        {
                            console.log(e);
                        }
                    },
                    removeRow: function (index) {
                        if (this.rows.length > 1) {
                            this.rows.splice(index, 1);
                            this.informacion.total -= this.rows[index].subtotal;
                        } else {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: '¡No puedes borrar la ultima fila que te queda!',
                            })
                        }
                    },
                    postData: function (event) {
                        var _this = this;
                        $('#submit').addClass('disabled');
                        var token = $('meta[name="csrf-token"]').attr('content');

                        this.$validator.validate().then(result => {
                        if (!result) {
                            swal({
                                    title: "Error",
                                    text: "Por favor revise los campos e intenta de nuevo",
                                    type: "error",
                                    confirmButtonClass: "btn btn-success btn-fill",
                                    buttonsStyling: false
                                });
                        } else {
                            $.ajax({
                            context: this,
                            type: "POST",
                            url: "/Entrada",
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

                            },
                            error: function(xhr) {
                                console.log(xhr);
                                var errorMessage = '';
                                jQuery.each(xhr.responseJSON, function(i, val) {
                                    errorMessage += " - " + val + "<br>";
                                });
                                swal({
                                    title: 'Oh no, algo ha salido mal',
                                    text: xhr.responseJSON.mensaje,
                                    type: xhr.responseJSON.tipo,
                                    confirmButtonClass: "btn btn-info btn-fill",
                                    buttonsStyling: false
                                });
                                $('#submit').removeClass('disabled');
                            }});
                        }
                        });
                        
                        event.preventDefault();
                    } //
                }
            });

        });
    </script>
@endsection
