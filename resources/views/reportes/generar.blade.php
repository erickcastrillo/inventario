@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
    <div class="container-fluid">
        <div class="row" id="app">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title">Por favor especifique los par&aacute;metros del reporte</h4>
                    </div>
                    <div class="card-content">
                        <form>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title">Tipo de reporte</h4>
                                    <div class="form-group">
                                        <select v-model="ajaxData.table" name="table" id="table" class="form-control">
                                            @foreach ($tipos_reporte as $tipo_reporte)
                                                <!-- todo -->
                                                <option value="{{ $tipo_reporte["name"] }}"> {{ $tipo_reporte["name"] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">Fecha de Inicio</h4>
                                    <div class="form-group">
                                        <date-picker
                                            :config="inicio"
                                            id="fechaInicio"
                                            class="form-control"
                                            name="fechaInicio"
                                            :value="moment().startOf('month').format('YYYY-MM-DD')"
                                            required
                                            title="Debe seleccionar una fecha valida"
                                            v-model="ajaxData.fechaInicio"
                                        > </date-picker>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">Fecha Final</h4>
                                    <div class="form-group">
                                        <date-picker
                                            :config="final"
                                            id="fechaFinal"
                                            class="form-control"
                                            name="fechaFinal"
                                            required
                                            :value="moment().format('YYYY-MM-DD')"
                                            title="Debe seleccionar una fecha valida"
                                            v-model="ajaxData.fechaFinal"
                                        > </date-picker>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-border panel-default">
                                        <a data-toggle="collapse" href="#collapseOnePlain" class="collapsed" aria-expanded="false">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    Filtros adicionales
                                                    <i class="ti-angle-down"></i>
                                                </h4>
                                            </div>
                                        </a>
                                        <div id="collapseOnePlain" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr role="row">
                                                            <th scope="col">#</th>
                                                            <th scope="col">Tipo de filtro</th>
                                                            <th scope="col">Valor</th>
                                                            <th scope="col" class="td-actions text-center">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        <tr  role="row" v-for="(filtro, index) in ajaxData.filtros" :key="index">
                                                            <td>
                                                                @{{ index +1 }}
                                                            </td>
                                                            <td>
                                                                <select 
                                                                    class="form-control" 
                                                                    v-model="filtro.nombre" 
                                                                    :name="'filtro_nombre-' + index" 
                                                                    :id="'filtro_nombre-' + index"
                                                                >
                                                                    <option disabled selected value="">-Seleccione-</option>
                                                                    
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input 
                                                                    type="text" 
                                                                    class="form-control" 
                                                                    :name="'filtro_valor-' + index" 
                                                                    :id="'filtro_valor-' + index" 
                                                                    v-model="filtro.valor" 
                                                                >
                                                            </td>
                                                            <td data-name="del" class="text-center td-actions">
                                                                <a rel="tooltip" class="btn btn-success btn-simple" data-original-title="Añadir" @click="addRow(index)">
                                                                    <i class="ti-plus"></i>
                                                                    Añadir
                                                                </a>
                                                                <a rel="tooltip" class="btn btn-danger btn-simple" data-original-title="Borrar" @click="removeRow(index)">
                                                                    <i class="ti-close"></i>
                                                                    Borrar
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group text-center">
                                        <button type="button" class="btn btn-wd btn-default btn-fill btn-lg"
                                            v-on:click="postData()">
                                            Generar Reporte
                                            <span class="btn-label">
                                                <i class="ti-control-play"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col-md-12 -->

            <div class="col-md-12" v-show="isTableVisible" v-cloak>
                <div class="card">
                    <div class="card-content">
                        <div class="fresh-datatables">
                            <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                                class="table table-striped table-no-bordered table-hover dataTable dtr-inline"
                                                cellspacing="0" width="100%" style="width: 100%;" role="grid"
                                                aria-describedby="datatables_info">
                                            <thead>
                                                <tr role="row">
                                                    <th v-for="header in datatableinfo.headers">@{{ header }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" v-for="row in datatableinfo.data">
                                                    <td v-for="value in row">@{{ value }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- end row -->
    </div>
</div>
<script>
    
    $(document).ready(function () {

        Vue.component('date-picker', VueBootstrapDatetimePicker.default);
        Vue.component('v-select', VueSelect.VueSelect);

        var app = new Vue({
            el: '#app',
            data: {
                isTableVisible: false,
                ajaxData: {
                    table: "",
                    fechaInicio: moment().startOf('month').format('YYYY-MM-DD'),
                    fechaFinal: moment().format('YYYY-MM-DD'),
                    filtros: [
                        {
                            nombre: "",
                            valor: ""
                        },
                    ]
                },
                inicio: {
                    format: 'YYYY-MM-DD',
                    useCurrent: true,
                    showClear: true,
                    showClose: true,
                },
                final: {
                    format: 'YYYY-MM-DD',
                    useCurrent: true,
                    showClear: true,
                    showClose: true,
                },
                datatableinfo: {
                    headers: {
                        
                    },
                    data: {
                        
                    }
                }
            },
            watch: {
                datatableinfo: {
                    handler(newVal) {

                        console.log(newVal);

                        this.$nextTick(function () {

                            $('#datatable').DataTable({
                                dom: 'Bfrtip',
                                responsive: true,
                                destroy: true,
                                buttons: [
                                    'excelHtml5',
                                ],
                                language: {
                                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                                }
                            });

                        });
                    },
                    deep: true,
                }
            },
            methods: {
                postData: function () {
                    var _this = this;
                    if(!_this.ajaxData.table == "" && !_this.ajaxData.fechaInicio == "" && !_this.ajaxData.fechaFinal == "")
                    {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            context: this,
                            type: "POST",
                            url: "/Reporte/Generar",
                            dataType: 'json',
                            data: {
                                _token: token,
                                table: _this.ajaxData.table,
                                fechaInicio: moment(_this.ajaxData.fechaInicio, 'YYYY-MM-DD').format('YYYY-MM-DD H:mm:ss'),
                                fechaFinal: moment(_this.ajaxData.fechaFinal, 'YYYY-MM-DD').format('YYYY-MM-DD H:mm:ss'),
                                filtros: _this.ajaxData.filtros
                            },
                            success: function(result) {

                               _this.isTableVisible = false;

                                if ( $.fn.DataTable.isDataTable('#datatable') ) {
                                    $('#datatable').DataTable().destroy();
                                }

                                Vue.set(_this, 'datatableinfo', result);

                                _this.isTableVisible = true;

                            },
                            error: function(xhr) {
                                var errorMessage = '';
                                swal({
                                    title: 'Oh no, algo ha salido mal',
                                    html: '<b>Error:</b> ' + xhr.status + " " + xhr.statusText,
                                    type: 'error',
                                    confirmButtonClass: "btn btn-info btn-fill",
                                    buttonsStyling: false
                                });
                            }
                        });
                    }
                    else
                    {                        
                        console.log(_this.ajaxData);
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Parece haber un problema con la informacion reqerida para procesar el reporte',
                            confirmButtonClass: "btn btn-info btn-fill",
                            buttonsStyling: false
                        })
                    }
                },
            }
        })

    });
    
</script>
@endsection