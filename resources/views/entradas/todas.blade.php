@extends('layouts.master')
@section('content')
    @include('layouts.flashes')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                                    <th>Proyecto</th>
                                                    <th>Tarea</th>
                                                    <th>Concepto</th>
                                                    <th>Pais</th>
                                                    <th>Estado</th>
                                                    <th>Creado por</th>
                                                    <th>Editado por</th>
                                                    <th>Creado</th>
                                                    <th>Editado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($entradas as $entrada)
                                                    <tr role="row">
                                                        <td tabindex="0" class="sorting_1">{{ $entrada->id }}</td>
                                                        <td>{{ $entrada->fecha_factura }}</td>
                                                        <td>{{ $entrada->n_factura }}</td>
                                                        <td>{{ $entrada->proyecto_id }}</td>
                                                        <td>{{ $entrada->tarea_id }}</td>
                                                        <td>{{ $entrada->tipo_concepto_id }}</td>
                                                        <td>{{ $entrada->pais }}</td>
                                                        <td>{{ $entrada->estado }}</td>
                                                        <td>{{ $entrada->creado_id }}</td>
                                                        <td>{{ $entrada->editado_id }}</td>
                                                        <td>{{ $entrada->created_at }}</td>
                                                        <td>{{ $entrada->updated_at }}</td>
                                                        <td>
                                                            <a href="#"
                                                               class="btn btn-simple btn-info btn-icon like"><i
                                                                        class="ti-heart"></i></a>
                                                            <a href="#"
                                                               class="btn btn-simple btn-warning btn-icon edit"><i
                                                                        class="ti-pencil-alt"></i></a>
                                                            <a href="#"
                                                               class="btn btn-simple btn-danger btn-icon remove"><i
                                                                        class="ti-close"></i></a>
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
        $(document).ready(function() {

            $('#datatable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });

        });

    </script>

@endsection



