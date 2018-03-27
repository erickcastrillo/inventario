@extends('layouts.master') @section('content') @include('layouts.flashes')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Data Tables</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Bootstrap Data Table</h4>
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Fecha de factura</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Numero de la factura</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">ID de proyecto</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">ID de tarea</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">ID tipo de concepto</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Pais</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Estado</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Creado por</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Editado por</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Creado</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Editado</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Position: activate to sort column ascending">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($entradas as $entrada)
                <tr>
                  <td role="row">{{ $entrada->id }}</td>
                  <td role="row">{{ $entrada->fecha_factura }}</td>
                  <td role="row">{{ $entrada->n_factura }}</td>
                  <td role="row">{{ $entrada->id_proyecto }}</td>
                  <td role="row">{{ $entrada->id_tarea }}</td>
                  <td role="row">{{ $entrada->id_tipo_concepto }}</td>
                  <td role="row">{{ $entrada->pais }}</td>
                  <td role="row">{{ $entrada->estado }}</td>
                  <td role="row">{{ $entrada->id_creado }}</td>
                  <td role="row">{{ $entrada->id_editado }}</td>
                  <td role="row">{{ $entrada->created_at }}</td>
                  <td role="row">{{ $entrada->updated_at }}</td>
                  <td role="row">
                    <div class="btn-group-vertical btn-group-sm">
                      <a class="btn btn-outline-primary" href="/Entradas/Ver/{{ $entrada->id }}" role="button">Ver</a>
                      <a class="btn btn-outline-success" href="/Entradas/Editar/{{ $entrada->id }}" role="button">Editar</a>
                      <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ConfirmarBorrado" data-idborrado="{{ $entrada->id }}">Borrar</button>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ConfirmarBorrado" tabindex="-1" role="dialog" aria-labelledby="ConfirmarBorrado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmar borrado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>En realidad desea borrar la entrada con el ID <strong id="ID_Borrado"></strong>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="continue_borrado">Borrar</button>
          </div>
        </div>
      </div>
    </div>
    <script type='text/javascript'>
      $('#ConfirmarBorrado').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var IDBorrado = button.data('idborrado') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        $('#ID_Borrado').text(IDBorrado)
      })
      $('#continue_borrado').click(function() {
        var id_borrado = $('#ID_Borrado').text();
        $('#ConfirmarBorrado').modal('show');
      });
    </script>
  </div>
</main>

@endsection