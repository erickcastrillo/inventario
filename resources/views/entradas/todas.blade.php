@extends('layouts.master')
@section('content')
    @include('layouts.flashes')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="title">Mostrando las últimas 30 entradas más recientes</h4>
                            <p class="category">
                                Por defecto se muestran las 30 entradas más recientes. Si necesita ver entradas
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
                                        <a href="/Entrada" role="button" class="btn btn-wd btn-default btn-fill btn-rotate">
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
                                                    <th>Fecha de factura</th>
                                                    <th>Factura</th>
                                                    <th>Movimiento</th>
                                                    <th>Proveedor</th>
                                                    <th>Proyecto</th>
                                                    <th>Tarea</th>
                                                    <th>Concepto</th>
                                                    <th>Pais</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($entradas as $entrada)
                                                    <tr role="row">
                                                        <td tabindex="0" class="sorting_1">{{ $entrada->id }}</td>
                                                        <td>{{ $entrada->fecha_factura }}</td>
                                                        <td>{{ $entrada->n_factura }}</td>
                                                        <td>{{ $entrada->get_movimiento()->nombre }}</td>
                                                        <td>{{ $entrada->get_proveedor()->nombre }}</td>
                                                        <td>{{ $entrada->get_proyecto()->nombre }}</td>
                                                        <td>{{ $entrada->get_tarea()->nombre }}</td>
                                                        <td>{{ $entrada->get_tipo_concepto()->nombre }}</td>
                                                        <td>{{ $entrada->pais }}</td>
                                                        <td>
                                                            <a href="/Entrada/{{$entrada->id}}" role="button" class="btn btn-sm btn-simple" >
                                                                <span class="btn-label">
                                                                    <i class="fa fa-eye"></i>
                                                                </span>
                                                                Ver
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-simple" onclick="deleteEntrada({{ $entrada->id }})">
                                                                <span class="btn-label">
                                                                    <i class="fa fa-close"></i>
                                                                </span>
                                                                Borrar
                                                            </button>
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
    <script type="text/javascript">
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

        function deleteEntrada(entrada) {
            swal({
                title: '¿Está seguro que desea borrar la entrada ' + entrada + '?',
                text: "¡Por favor tenga en cuenta que esta acción no se podrá revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success btn-fill',
                cancelButtonClass: 'btn btn-danger btn-fill',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, ¡Bórralo!',
                buttonsStyling: false
            }).then(function() {
                $.ajax({
                    url: '/Entrada/' + entrada,
                    data :{
                        _token : $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
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
                        swal({
                            title: 'Error',
                            html:
                            'Oh no, algo ha salido mal <br/>' +
                            '<b>Error:</b> ' + xhr.status + " " + xhr.statusText,
                            type: 'error',
                            confirmButtonClass: "btn btn-info btn-fill",
                            buttonsStyling: false
                        })
                    }
                });

            }, function(dismiss) {
                // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Cancelado',
                        text: 'Ningún cambio se ha guardado',
                        type: 'warning',
                        confirmButtonClass: "btn btn-info btn-fill",
                        buttonsStyling: false
                    })
                }
            })
        }

        function reload() {
            var fechaInicio = $('#fecha-inicio').val();
            var fechaFinal = $('#fecha-final').val();

            if (fechaInicio && fechaFinal) {

                $(location).attr('href', '/Entrada/Obtener/' + fechaInicio + '/' + fechaFinal);
            }
        };

    </script>

@endsection
