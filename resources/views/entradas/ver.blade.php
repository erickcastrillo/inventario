@extends('layouts.master')
@section('content')
    @include('layouts.flashes')
    <!-- ### $App Screen Content ### -->
    <div class="content">
        <div class="container-fluid" id="printTable">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row">
                          <div class="col-md-10">
                            <h4 class="card-title">Informacion general de la Entrada número {{ $entrada->id }}</h4>
                          </div>
                          <div class="col-md-2">
                            
                          </div>
                        </div>
                        <br/>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="typo-line">
                                        <strong class="col-md-3">ID</strong>
                                        <p class="col-md-9">{{ $entrada->id }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-3">Factura</strong>
                                        <p class="col-md-9">{{ $entrada->n_factura }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-3">Proveedor</strong>
                                        <p class="col-md-9">{{ $entrada->get_proveedor()->nombre }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-3">Tarea</strong>
                                        <p class="col-md-9">{{ $entrada->get_tarea()->nombre }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-3">Pais</strong>
                                        <p class="col-md-9">{{ $entrada->pais }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="typo-line">
                                        <strong class="col-md-4">Fecha de factura</strong>
                                        <p class="col-md-8">{{ $entrada->fecha_factura }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-4">Movimiento</strong>
                                        <p class="col-md-8">{{ $entrada->get_movimiento()->nombre }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-4">Proyecto</strong>
                                        <p class="col-md-8">{{ $entrada->get_proyecto()->nombre }}</p>
                                    </div>
                                    <div class="typo-line">
                                        <strong class="col-md-4">Concepto</strong>
                                        <p class="col-md-8">{{ $entrada->get_tipo_concepto()->nombre }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detalles de la Entrada número {{ $entrada->id }}
                            </h4>
                            <p class="category">
                                Cantidad de productos <strong>{{ count($detalles) }}</strong>
                            </p>
                        </div>
                        <div class="card-content">
                            <table class="table table-striped">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center">ID</th>
                                        <th>ID de articulo</th>
                                        <th>Cantidad</th>
                                        <th>Costo unitario</th>
                                        <th>Moneda</th>
                                        <th>Lote</th>
                                        <th>Serie</th>
                                        <th>Pais</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($detalles as $detalle)
                                    <tr>
                                        <td role="row">{{ $detalle->id }}</td>
                                        <td role="row">{{ $detalle->get_articulo()->descripcion }}</td>
                                        <td role="row">{{ $detalle->cantidad }}</td>
                                        <td role="row">{{ $detalle->costo_unitario }}</td>
                                        <td role="row">{{ $detalle->get_moneda()->sigla }}</td>
                                        <td role="row">{{ $detalle->lote }}</td>
                                        <td role="row">{{ $detalle->serie }}</td>
                                        <td role="row">{{ $detalle->pais }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
    function printData()
    {
     var divToPrint=document.getElementById("printTable");
     newWin= window.open("");
     newWin.document.write(divToPrint.outerHTML);
     newWin.print();
     newWin.close();
    }

    $('button').on('click',function(){
    printData();
    })
  </script>
@endsection
