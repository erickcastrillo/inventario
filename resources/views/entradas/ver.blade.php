@extends('layouts.master') @section('content') @include('layouts.flashes')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
    <div id='mainContent'>
        <div class="container-fluid">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Informacion general de la Entrada número {{ $entrada->id }}</h6>
                <div class="mT-30 gap-20">
                    <table class="table table-condensed table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr role="row">
                                <th>ID</th>
                                <th>Fecha factura</th>
                                <th>Numero factura</th>
                                <th>ID proyecto</th>
                                <th>ID tarea</th>
                                <th>ID concepto</th>
                                <th>Pais</th>
                                <th>Estado</th>
                                <th>Creado por</th>
                                <th>Editado por</th>
                                <th>Creado en</th>
                                <th>Editado en</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h6 class="c-grey-900">Detalles de la Entrada número {{ $entrada->id }}</h6>
                <h6 class="c-grey-900">Cantidad de productos {{ count($detalles) }}</h6>
                <div class="mT-30">
                    <table class="table table-condensed table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr role="row">
                                <th>ID</th>
                                <th>ID de compra</th>
                                <th>ID de articulo</th>
                                <th>Cantidad</th>
                                <th>Costo unitario</th>
                                <th>Moneda</th>
                                <th>Lote</th>
                                <th>Serie</th>
                                <th>Pais</th>
                                <th>ID Entrada</th>
                                <th>Estado</th>
                                <th>Creado por</th>
                                <th>Editado por</th>
                                <th>Creado en</th>
                                <th>Editado en</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $detalle)
                            <tr>
                                <td role="row">{{ $detalle->id }}</td>
                                <td role="row">{{ $detalle->id_compra }}</td>
                                <td role="row">{{ $detalle->id_articulo }}</td>
                                <td role="row">{{ $detalle->cantidad }}</td>
                                <td role="row">{{ $detalle->costo_unitario }}</td>
                                <td role="row">{{ $detalle->id_moneda }}</td>
                                <td role="row">{{ $detalle->lote }}</td>
                                <td role="row">{{ $detalle->serie }}</td>
                                <td role="row">{{ $detalle->pais }}</td>
                                <td role="row">{{ $detalle->entrada_id }}</td>
                                <td role="row">{{ $detalle->estado }}</td>
                                <td role="row">{{ $detalle->id_creado }}</td>
                                <td role="row">{{ $detalle->id_editado }}</td>
                                <td role="row">{{ $detalle->created_at }}</td>
                                <td role="row">{{ $detalle->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection