@extends('layouts.master')
@section('content')
    @include('layouts.flashes')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                    <div class="typo-line">
                                        <div class="col-md-4">
                                            <h4 class="card-title">Proveeddor</h4>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="btn-group bootstrap-select">
                                                <button type="button"
                                                        class="dropdown-toggle bs-placeholder btn btn-default btn-block"
                                                        data-toggle="dropdown" role="button" title="Single Select"
                                                        aria-expanded="false">
                                                    <span class="filter-option pull-left">
                                                        Seleccione un opción
                                                    </span>&nbsp;
                                                    <span class="bs-caret">
                                                        <span class="caret"></span>
                                                    </span>
                                                </button>
                                                <div class="dropdown-menu open" role="combobox"
                                                     style="max-height: 280px; overflow: hidden;">
                                                    <ul class="dropdown-menu inner" role="listbox" aria-expanded="false"
                                                        style="max-height: 280px; overflow-y: auto;">
                                                        <li data-original-index="1">
                                                            <a tabindex="0"
                                                               class=""
                                                               data-tokens="null" role="option"
                                                               aria-disabled="false"
                                                               aria-selected="false">
                                                                <span class="text">
                                                                    Bahasa Indonesia
                                                                </span>
                                                                <span class=" ti-check check-mark"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection