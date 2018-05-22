@extends('layouts.master')
@section('content')
    @include('layouts.flashes')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="title">Mostrando las autorizaciones del inicio de mes a la fecha</h4>
                            <p class="category">
                                Por defecto se muestran las autorizaciones del inicio de mes a la fecha. Si necesita ver autorizaciones
                                correspondientes a otras fechas, por favor espefique las fechas y presione recargar.
                            </p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title">Fecha de Inicio</h4>
                                    <div class="form-group">
                                        <input type="text" id="fecha-inicio" class="form-control datetimepicker"
                                                placeholder="Fecha de Inicio">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">Fecha Final</h4>
                                    <div class="form-group">
                                        <input type="text" id="fecha-final" class="form-control datetimepicker"
                                                placeholder="Fecha Final">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">&nbsp;</h4>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-wd btn-default btn-fill btn-rotate"
                                                onclick="reload();">
                                                <span class="btn-label">
                                                    <i class="ti-settings"></i>
                                                </span>
                                            Recargar
                                        </button>
                                        <a href="/Traslado" role="button" class="btn btn-wd btn-default btn-fill btn-rotate">
                                                <span class="btn-label">
                                                    <i class="ti-files"></i>
                                                </span>
                                            Mostrar todo
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
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
                                                    <th>#</th>
                                                    <th>Almacen Entrada</th>
                                                    <th>Almacen Salida</th>
                                                    <th>Fecha Retiro</th>
                                                    <th>Hora Retiro</th>
                                                    <th>Movimiento</th>
                                                    <th>Departamento</th>
                                                    <th>Nombre de quien retira</th>
                                                    <th>ID de quien retira</th>
                                                    <th>Notas</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($traslados as $traslado)
                                                    <tr role="row">
                                                        <td tabindex="0" class="sorting_1">{{ $traslado->id }}</td>
                                                        <td>{{ $traslado->get_almacenes_entrada()->descripcion }}</td>
                                                        <td>{{ $traslado->get_almacenes_salida()->descripcion }}</td>
                                                        <td>{{ $traslado->fecha_retiro }}</td>
                                                        <td>{{ $traslado->hora_retiro }}</td>
                                                        <td>{{ $traslado->get_movimiento()->nombre }}</td>
                                                        <td>{{ $traslado->get_departamento()->nombre }}</td>
                                                        <td>{{ $traslado->nombre_retira }}</td>
                                                        <td>{{ $traslado->id_personal_retira }}</td>
                                                        <td>{{ $traslado->notas }}</td>
                                                        <td>
                                                            <a href="/Traslado/{{ $traslado->id }}" role="button" class="btn btn-default" >
                                                                <span class="btn-label">
                                                                    <i class="fa fa-eye"></i>
                                                                </span>
                                                                Ver
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('#datatable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'excelHtml5',
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
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

        function reload() {
            var fechaInicio = $('#fecha-inicio').val();
            var fechaFinal = $('#fecha-final').val();

            if (fechaInicio && fechaFinal) {

                $(location).attr('href', '/Traslado/Obtener/' + fechaInicio + '/' + fechaFinal);
            }
        };
    </script>
@endsection