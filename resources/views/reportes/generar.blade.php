@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
    <div class="container-fluid">
        <div class="row" id="app">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title">Por favor especifique los parametors del reporte</h4>
                    </div>
                    <div class="card-content">
                        <form>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="card-title">Tipo de reporte</h4>
                                    <div class="form-group">
                                        <select v-model="ajaxData.table" name="table" id="table" class="form-control">
                                            <option selected value="">-Seleccione-</option>
                                            @foreach ($tipos_reporte as $tipo_reporte)
                                                <!-- todo -->
                                                <option value="{{ $tipo_reporte["name"] }}"> {{ $tipo_reporte["name"] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="card-title">Fecha de Inicio</h4>
                                    <div class="form-group">
                                        <input v-model="ajaxData.fechaInicio" 
                                            type="text" id="fechaInicio"
                                            v-on:change="checkForm"
                                            class="form-control datetimepicker"
                                            placeholder="Fecha de Inicio">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="card-title">Fecha Final</h4>
                                    <div class="form-group">
                                        <input v-model="ajaxData.fechaFinal" 
                                            type="text" id="fechaFinal"
                                            v-on:change="checkForm"
                                            class="form-control datetimepicker"
                                            placeholder="Fecha Final">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="card-title">&nbsp;</h4>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-wd btn-default btn-fill btn-move-right"
                                            v-on:click="postData()"
                                            :disabled="isGenerateButtonDisable">
                                            Generar
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
                                                    <th v-for="header in dataTable.headers">@{{ header }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" v-for="row in dataTable.rows">
                                                    <td v-for="(value, key) in row">@{{ key }}</td>
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

        var app = new Vue({
            el: '#app',
            data: {
                isTableVisible: false,
                isGenerateButtonDisable: true,
                ajaxData: {
                    table: "",
                    fechaInicio: "",
                    fechaFinal: "",
                    filtros: [
                        {
                            nombre: "",
                            valor: ""
                        },
                    ]
                },
                dataTable: {
                    headers: {
                        
                    },
                    rows: {
                        
                    }
                }
            },
            watch: {
                ajaxData: {
                    handler(newVal) {
                        var _this = this;
                        if(!newVal.table == "" && newVal.fechaInicio && newVal.fechaFinal)
                        {
                            _this.isGenerateButtonDisable = false
                        }
                        else
                        {
                            _this.isGenerateButtonDisable = true
                        }
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
                                Vue.set(_this.dataTable, 'headers', result.headers);
                                Vue.set(_this.dataTable, 'rows', result.data);

                                _this.isTableVisible = !_this.isTableVisible;

                                this.$nextTick(function () {

                                    if ( $.fn.dataTable.isDataTable( '#datatable' ) ) {

                                        $('#datatable').DataTable({
                                            dom: 'Bfrtip',
                                            destroy: true,
                                            responsive: true,
                                            buttons: [
                                                'excelHtml5',
                                                'pdfHtml5',
                                            ],
                                            language: {
                                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                                            }
                                        });

                                    }
                                    else {

                                        $('#datatable').DataTable({
                                            dom: 'Bfrtip',
                                            responsive: true,
                                            destroy: true,
                                            buttons: [
                                                'excelHtml5',
                                                'pdfHtml5',
                                            ],
                                            language: {
                                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                                            }
                                        });

                                    }

                                });

                            },
                            error: function(xhr) {
                                console.log(xhr);
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
                        //_this.isGenerateButtonDisable = !_this.isGenerateButtonDisable
                        //_this.isTableVisible = !_this.isTableVisible;
                    }
                },
            }
        })

        
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',    //use this format if you want the 12hours timpiecker with AM/PM toggle
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