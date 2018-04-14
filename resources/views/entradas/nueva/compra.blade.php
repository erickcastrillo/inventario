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
                                                        <select class="form-control" name="id_proveedor" id="id_proveedor">
                                                            @foreach($proveedores as $proveedor)
                                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">No. Factura</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="n_factura" id="n_factura">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Fecha Factura</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="fecha-final" class="form-control datetimepicker"
                                                               name="fecha_factura" id="fecha_factura">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Moneda</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="id_proveedor" id="id_proveedor">
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
                                                        <select class="form-control" name="proyecto_id" id="proyecto_id">
                                                            @foreach($proyectos as $proyecto)
                                                                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Tarea</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="tarea_id" id="tarea_id">
                                                            @foreach($tareas as $tarea)
                                                                <option value="{{ $tarea->id }}">{{ $tarea->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Tipo / Concepto</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="tipo_concepto_id" id="tipo_concepto_id">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Detalles de la Entrada
                                </h4>
                                <div class="card-content">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr role="row">
                                            <th>Articulo</th>
                                            <th>Cantidad</th>
                                            <th>Costo unitario</th>
                                            <th>Serie</th>
                                            <th>Lote</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="card card-plain">
                                        <div class="card-content">
                                            <div class="col-md-3 col-md-offset-9">
                                                <h5>Total : </h5>
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
                                                <button type="submit" class="btn btn-fill btn-danger btn-magnify">
                                                    <span class="btn-label">
	                                                    <i class="ti-trash"></i>
	                                                </span>
                                                    Limpiar
                                                </button>
                                                <button type="submit" class="btn btn-fill btn-info btn-magnify">
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