<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>UFINET | {{ Request::route()->getName() }}</title>

    <!-- Canonical SEO -->

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="/css/paper-dashboard.css?v=1.2.1" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/css/themify-icons.css" rel="stylesheet">
</head>

<body>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="" data-image="img/background/background-2.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="/auth/login">
                            {!! csrf_field() !!}
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="alert-heading">¡Ha ocurrido un error!</h4>
                                        <p class="mb-0">{{ $error }}</p>
                                    </div>
                                @endforeach
                            @endif
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header">
                                    <h3 class="card-title text-center">Login</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Correo electr&oacute;nico</label>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Ingrese correo" class="form-control input-no-border" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" placeholder="Contraseña" class="form-control input-no-border" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Iniciar sesi&oacute;n</button>
                                    <div class="forgot">
                                        <a href="#pablo">¿Olvido su contraseña??</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <div class="copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script>, UFINET
                </div>
            </div>
        </footer>
        <div class="full-page-background" style="background-image: url(/img/background/background-2.jpg) "></div>
    </div>
</div>
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>



</html>
