@if (session('error'))
    <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        <h4 class="alert-heading">¡Error!</h4>
        <p>{{ session('error') }}</p>
        <hr>
        <p class="mb-0">Contacte a su administrador para solucionar este inconveniente</p>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        <h4 class="alert-heading">Exito!</h4>
        <p>{{ session('success') }}</p>
    </div>
@endif