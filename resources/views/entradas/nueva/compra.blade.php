@extends('layouts.master')
@section('content')
    @include('layouts.flashes')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="nueva-entrada-form">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nueva Entrada por Compra</h4>
                                <p class="category">
                                    Por favor ingrese los datos requeridos, una vez llenos presione <strong>Guardar</strong>
                                </p>
                            </div>
                            <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Proveeddor</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                                class="form-control"
                                                                name="id_proveedor"
                                                                id="id_proveedor"
                                                                required
                                                                title="Debe seleccionar un Proveeddor"
                                                                v-model="id_proveedor"
                                                        >
                                                            <option value="">-Seleccione-</option>
                                                            @foreach($proveedores as $proveedor)
                                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">No. Factura</label>
                                                    <div class="col-sm-8">
                                                        <input
                                                                type="text"
                                                                class="form-control"
                                                                name="n_factura"
                                                                id="n_factura"
                                                                number="true"
                                                                required
                                                                title="Debe ingresar un No. Factura valido"
                                                                v-model="n_factura"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Fecha Factura</label>
                                                    <div class="col-sm-8">
                                                        <input
                                                                type="text"
                                                                id="fecha_factura"
                                                                class="form-control datetimepicker"
                                                                name="fecha_factura"
                                                                required
                                                                title="Debe seleccionar una Fecha valida"
                                                                v-model="fecha_factura"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Moneda</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                                class="form-control"
                                                                name="moneda_id"
                                                                id="moneda_id"
                                                                required
                                                                title="Debe seleccionar una Moneda"
                                                                v-model="moneda_id"
                                                        >
                                                            <option value="">-Seleccione-</option>
                                                            @foreach($monedas as $moneda)
                                                                <option value="{{ $moneda->id }}">{{ $moneda->nombre }} - {{ $moneda->sigla }}</option>
                                                            @endforeach
                                                        </select>
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
                                                                class="form-control"
                                                                name="proyecto_id"
                                                                id="proyecto_id"
                                                                required
                                                                title="Debe seleccionar un Proyecto valido"
                                                                v-model="proyecto_id"
                                                        >
                                                            <option value="">-Seleccione-</option>
                                                            @foreach($proyectos as $proyecto)
                                                                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Tarea</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                                class="form-control"
                                                                name="tarea_id"
                                                                id="tarea_id"
                                                                required
                                                                title="Debe seleccionar una Tarea valida"
                                                                v-model="tarea_id"
                                                        >
                                                            <option value="">-Seleccione-</option>
                                                            @foreach($tareas as $tarea)
                                                                <option value="{{ $tarea->id }}">{{ $tarea->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Tipo / Concepto</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                                class="form-control"
                                                                name="tipo_concepto_id"
                                                                id="tipo_concepto_id"
                                                                required
                                                                title="Debe seleccionar un Tipo / Concepto valido"
                                                                v-model="tipo_concepto_id"
                                                        >
                                                            <option value="">-Seleccione-</option>
                                                            @foreach($tiposconcepto as $tipoconcepto)
                                                                <option value="{{ $tipoconcepto->id }}">{{ $tipoconcepto->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="card" id="app">
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
                                                        <option value="">-Seleccione-</option>
                                                        @foreach($articulos as $articulo)
                                                            <option value="{{ $articulo->id }}">{{ $articulo->descripcion }}</option>
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
                                                <h5 class="text-right">Total: <span>@{{ total | currencyDisplay }}</span></h5>
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
                                                        <textarea name="notas" id="notas" class="form-control" rows="3"></textarea>
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
                                                <button type="reset" class="btn btn-fill btn-danger btn-magnify">
                                                    <span class="btn-label">
	                                                    <i class="ti-trash"></i>
	                                                </span>
                                                    Limpiar
                                                </button>
                                                <button type="submit" class="btn btn-fill btn-info btn-magnify" @click="getData()">
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
        Vue.filter('currencyDisplay', {
            // model -> view
            read: function (val) {
                if (val > 0) {
                    return accounting.formatMoney(val, "$", 2, ".", ",");
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
                        articulo: 5,
                        cantidad: 27,
                        costo: 55.20,
                        serie: 10,
                        lote: 27,
                    },

                ],
                total: 0,
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
                        console.log(e);
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
                        })
                    }
                },
                getData: function () {
                    $.ajax({
                        context: this,
                        type: "POST",
                        data: {
                            rows: this.rows,
                            total: this.total,
                        },
                        url: "/api/data"
                    });
                }
            }
        });

        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap'
            });

            $('#nueva-entrada-form').validate();

            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD H:mm:ss',    //use this format if you want the 12hours timpiecker with AM/PM toggle
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