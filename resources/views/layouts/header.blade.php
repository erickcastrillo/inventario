<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>UFINET | {{ Request::route()->getName() }}</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!--  Paper Dashboard core CSS    -->
    <link href="/css/paper-dashboard.css?v=1.2.1" rel="stylesheet">

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">
    <link href="/css/themify-icons.css" rel="stylesheet">

    <!-- Datatables css file -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

    <!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
    <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>

    <script src="https://openexchangerates.github.io/accounting.js/accounting.min.js" type="text/javascript"></script>
    <script src="https://rubaxa.github.io/Sortable/Sortable.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js" type="text/javascript"></script>
    <script src="/js/jquery-ui.min.js" type="text/javascript"></script>

    <script src="/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
</head>
