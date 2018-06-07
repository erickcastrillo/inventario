@extends('layouts.master') @section('content') @include('layouts.flashes')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title">Mostrando todos los Articulos</h4>
                        <div class="row">
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-4">
                                <p class="category text-right">
                                    <button data-toggle="modal" data-target=".bs-modal-lg" class="btn btn-wd btn-default btn-fill btn-rotate">
                                        <span class="btn-label">
                                            <i class="ti-plus"></i>
                                        </span>
                                        Nuevo Articulo
                                    </button>
                                </p>
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
                                                <th>Código</th>
                                                <th>Descripción</th>
                                                <th>Imagen</th>
                                                <th>Medida</th>
                                                <th>Línea</th>
                                                <th>Grupo</th>
                                                <th>ABC</th>
                                                <th>País</th>
                                                <th>Estado</th>
                                                <th>Creado</th>
                                                <th>Editado</th>
                                                <th>Opciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{-- @foreach ($entradas as $entrada)
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
                                            @endforeach --}}
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
<div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="gridSystemModalLabel">Nuevo Articulo</h4>
            </div>
            <div class="modal-body">
                <form action="" >
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Línea:</label>
                        <select class="form-control" id="linea" name="linea">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Grupo:</label>
                        <select class="form-control" id="grupo" name="grupo">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">ABC:</label>
                        <select class="form-control" id="abc" name="abc">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Imagen:</label>
                        <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Estado:</label>
                        <select class="form-control" id="estado" name="estado">
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
        
    </div>
</div>
@endsection