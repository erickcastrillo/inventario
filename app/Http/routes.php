<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Rutas relacionadas al inicio
Route::get('/', 'InicioController@Index' )->name('Dashboard');
Route::get('/home', 'InicioController@Index' )->name('Dashboard');

// --------------------------------------------------------------------------------
// Entrada
// --------------------------------------------------------------------------------

// Rutas de las entradas como resource
Route::resource('Entrada', 'EntradaController',
['names' =>
    [
        'index' => 'Todas las entradas',
        'edit' => 'Editar entrada',
        'show' => 'Mostrar entrada',
        'create' => 'Crear entrada por compra',
        'update' => 'Actualizar entrada',
        'destroy' => 'Borrar entrada',
    ]
]);

// Route to get entradas using specific dates
Route::get('/Entrada/Obtener/{fecha_inicio}/{fecha_final}', 'EntradaController@get_data' )->name('Vista personalizada');

// --------------------------------------------------------------------------------
// Devolucion
// --------------------------------------------------------------------------------

// Rutas de las devoluciones como resource
Route::resource('Devolucion', 'DevolucionController',
['names' =>
    [
        'index' => 'Todas las devoluciones',
        'edit' => 'Editar devolucion',
        'show' => 'Mostrar devolucion',
        'create' => 'Crear entrada por devolución',
        'update' => 'Actualizar devolucion',
        'destroy' => 'Borrar devolucion',
    ]
]);

// Entrada por devolucion
Route::get('/Devolucion/Nueva/Devolucion', 'DevolucionController@nueva_entrada_devolucion')->name('Nueva Entrada por Devolucion');

// --------------------------------------------------------------------------------
// Traslado
// --------------------------------------------------------------------------------

// Rutas de los traslados como resource
Route::resource('Traslado', 'TrasladoController',
['names' =>
    [
        'index' => 'Todos los traslados',
        'edit' => 'Editar traslado',
        'show' => 'Mostrar traslado',
        'create' => 'Solicitud de traslado',
        'update' => 'Actualizar traslado',
        'destroy' => 'Borrar traslado',
    ]
]);

// Rutas de los ajustes como resource
Route::resource('Ajuste', 'AjusteController',
['names' =>
    [
        'index' => 'Todos los ajustes',
        'edit' => 'Editar ajuste',
        'show' => 'Mostrar ajuste',
        'create' => 'Crear ajuste',
        'update' => 'Actualizar ajuste',
        'destroy' => 'Borrar ajuste',
    ]
]);

// Rutas de los gastos como resource
Route::resource('Gasto', 'GastoController',
['names' =>
    [
        'index' => 'Todos los gastos',
        'edit' => 'Editar gasto',
        'show' => 'Mostrar gasto',
        'create' => 'Crear gasto',
        'update' => 'Actualizar gasto',
        'destroy' => 'Borrar gasto',
    ]
]);

// Rutas de los desechos como resource
Route::resource('Desecho', 'DesechoController',
['names' =>
    [
        'index' => 'Todos los desechos',
        'edit' => 'Editar desecho',
        'show' => 'Mostrar desecho',
        'create' => 'Crear desecho',
        'update' => 'Actualizar desecho',
        'destroy' => 'Borrar desecho',
    ]
]);

// --------------------------------------------------------------------------------
// Almacen
// --------------------------------------------------------------------------------

// Rutas de las almacenes como resource
Route::resource('Almacen', 'AlmacenController',
['names' =>
    [
        'index' => 'Todas los almacenes',
        'edit' => 'Editar almacenes',
        'show' => 'Mostrar almacenes',
        'create' => 'Crear almacenes',
        'update' => 'Actualizar almacenes',
        'destroy' => 'Borrar almacenes',
    ]
]);

Route::get('/Almacen/{id}/detalles', 'AlmacenController@getProductos');
Route::get('/Almacen/{almacen_id}/{producto_id}/lotes', 'AlmacenController@getLotes');
Route::get('/Almacen/{almacen_id}/{producto_id}/{lote}/series', 'AlmacenController@getSerie');

// Rutas de los tipos cambio como resource
Route::resource('TipoCambio', 'TipoCambioController',
['names' =>
    [
        'index' => 'Todos los tipos cambio',
        'edit' => 'Editar tipo cambio',
        'show' => 'Mostrar tipo cambio',
        'create' => 'Crear tipo cambio',
        'update' => 'Actualizar tipo cambio',
        'destroy' => 'Borrar tipo cambio',
    ]
]);

// Rutas de los articulos como resource
Route::resource('Articulo', 'ArticuloController',
['names' =>
    [
        'index' => 'Todos los articulos',
        'edit' => 'Editar articulo',
        'show' => 'Mostrar articulo',
        'create' => 'Crear articulo',
        'update' => 'Actualizar articulo',
        'destroy' => 'Borrar articulo',
    ]
]);

// Get the Unidades de Medida o a guveb product ID
Route::get('/Articulo/{id}/UnidadesMedida', 'ArticuloController@getUnidadesMedida');

// Rutas de los proveedores como resource
Route::resource('Proveedor', 'ProveedorController',
['names' =>
    [
        'index' => 'Todos los proveedores',
        'edit' => 'Editar proveedor',
        'show' => 'Mostrar proveedor',
        'create' => 'Crear proveedor',
        'update' => 'Actualizar proveedor',
        'destroy' => 'Borrar proveedor',
    ]
]);

// Rutas de las cuentas contables como resource
Route::resource('CuentaContable', 'CuentaContableController',
['names' =>
    [
        'index' => 'Todas las cuentas contables',
        'edit' => 'Editar cuentas contable',
        'show' => 'Mostrar cuentas contable',
        'create' => 'Crear cuentas contable',
        'update' => 'Actualizar cuentas contable',
        'destroy' => 'Borrar cuentas contable',
    ]
]);

// Rutas de los proyectos como resource
Route::resource('Proyecto', 'ProyectoController',
['names' =>
    [
        'index' => 'Todos los proyectos',
        'edit' => 'Editar proyecto',
        'show' => 'Mostrar proyecto',
        'create' => 'Crear proyecto',
        'update' => 'Actualizar proyecto',
        'destroy' => 'Borrar proyecto',
    ]
]);

// Rutas de las tareas como resource
Route::resource('Tarea', 'TareaController',
['names' =>
    [
        'index' => 'Todas las tareas',
        'edit' => 'Editar tarea',
        'show' => 'Mostrar tarea',
        'create' => 'Crear tarea',
        'update' => 'Actualizar tarea',
        'destroy' => 'Borrar tarea',
    ]
]);

// Rutas de las unidades de medida como resource
Route::resource('UnidadMedida', 'UnidadMedidaController',
['names' =>
    [
        'index' => 'Todas las unidades de medida',
        'edit' => 'Editar unidad de medida',
        'show' => 'Mostrar unidad de medida',
        'create' => 'Crear unidad de medida',
        'update' => 'Actualizar unidad de medida',
        'destroy' => 'Borrar unidad de medida',
    ]
]);

// Rutas de las monedas como resource
Route::resource('Moneda', 'MonedaController',
['names' =>
    [
        'index' => 'Todas las monedas',
        'edit' => 'Editar moneda',
        'show' => 'Mostrar moneda',
        'create' => 'Crear moneda',
        'update' => 'Actualizar moneda',
        'destroy' => 'Borrar moneda',
    ]
]);

// Rutas de los tipos de concepto como resource
Route::resource('TipoConcepto', 'TipoConceptoController',
['names' =>
    [
        'index' => 'Todos los tipos de concepto',
        'edit' => 'Editar tipo de concepto',
        'show' => 'Mostrar tipo de concepto',
        'create' => 'Crear tipo de concepto',
        'update' => 'Actualizar tipo de concepto',
        'destroy' => 'Borrar tipo de concepto',
    ]
]);

// Rutas de los movimientos como resource
Route::resource('Movimiento', 'MovimientoController',
['names' =>
    [
        'index' => 'Todos los movimientos',
        'edit' => 'Editar movimiento',
        'show' => 'Mostrar movimiento',
        'create' => 'Crear movimiento',
        'update' => 'Actualizar movimiento',
        'destroy' => 'Borrar movimiento',
    ]
]);

// Rutas de los departamentos como resource
Route::resource('Departamento', 'DepartamentoController',
['names' =>
    [
        'index' => 'Todos los departamentos',
        'edit' => 'Editar departamento',
        'show' => 'Mostrar departamento',
        'create' => 'Crear departamento',
        'update' => 'Actualizar departamento',
        'destroy' => 'Borrar departamento',
    ]
]);

// Rutas de los clientes como resource
Route::resource('Cliente', 'ClienteController',
['names' =>
    [
        'index' => 'Todos los clientes',
        'edit' => 'Editar cliente',
        'show' => 'Mostrar cliente',
        'create' => 'Crear cliente',
        'update' => 'Actualizar cliente',
        'destroy' => 'Borrar cliente',
    ]
]);

// Rutas de los enlaces como resource
Route::resource('Enlace', 'EnlaceController',
['names' =>
    [
        'index' => 'Todos los enlace',
        'edit' => 'Editar enlace',
        'show' => 'Mostrar enlace',
        'create' => 'Crear enlace',
        'update' => 'Actualizar enlace',
        'destroy' => 'Borrar enlace',
    ]
]);

// Rutas de los notificaciones como resource
Route::resource('Notificacion', 'NotificacionController',
['names' =>
    [
        'index' => 'Todos los notificaciones',
        'edit' => 'Editar notificacion',
        'show' => 'Mostrar notificacion',
        'create' => 'Crear notificacion',
        'update' => 'Actualizar notificacion',
        'destroy' => 'Borrar notificacion',
    ]
]);

// Rutas de los notificaciones como resource
Route::resource('Usuario', 'UserController',
['names' =>
    [
        'index' => 'Todos los usuarios',
        'edit' => 'Editar usuario',
        'show' => 'Mostrar usuario',
        'create' => 'Crear usuario',
        'update' => 'Actualizar usuario',
        'destroy' => 'Borrar usuario',
    ]
]);

Route::get('Reporte', 'ReporteController@index')->name('Generar reporte');
Route::post('Reporte/Generar', 'ReporteController@generar');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('Iniciar sesión');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('Nuevo registro');
Route::post('auth/register', 'Auth\AuthController@postRegister');
