<!doctype html>
<html lang="en" class="perfect-scrollbar-on">
@include('layouts.header')
<body>
<div class="wrapper">
    @include('layouts.sidebar')
    <div class="main-panel ps-container ps-theme-default ps-active-y">
        @if (session('error'))
            <script>
                $(document).ready(function () {
                    $.notify({
                        icon: "ti-face-sad",
                        title: "Error",
                        message: "{{ session('error') }}",
                    },{
                        type: 'danger',
                        timer: 4000,
                        allow_dismiss: true,
                        placement: {
                            from: 'top',
                            align: 'right',
                        },
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp',
                        },
                    });
                });
            </script>
        @endif
        @if (session('success'))
            <script>
                $(document).ready(function () {
                    $.notify({
                        icon: "ti-face-smile",
                        title: "Success",
                        message: "{{ session('success') }}",
                    },{
                        type: 'success',
                        timer: 4000,
                        allow_dismiss: true,
                        placement: {
                            from: 'top',
                            align: 'right',
                        },
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp',
                        },
                    });
                });
            </script>
        @endif

        @include('layouts.headernavbar')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>

 <!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->

<script src="/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/es6-promise-auto.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/bootstrap-datetimepicker.js"></script>
<script src="/js/bootstrap-selectpicker.js"></script>
<script src="/js/bootstrap-notify.js"></script>
<script src="/js/sweetalert2.js"></script>
<script src="/js/bootstrap-table.js"></script>
<script src="/DataTables/datatables.js"></script>
<script src="/js/paper-dashboard.js?v=1.2.1"></script>
<script src="//js.pusher.com/2.2/pusher.min.js"></script>

<script src="https://unpkg.com/vue/dist/vue.min.js"></script>
<script src="https://unpkg.com/vue-select@latest"></script>
<script src="https://unpkg.com/vee-validate@latest"></script>
<script src="https://unpkg.com/moment@2.18.1/min/moment.min.js"></script>

<script src="https://unpkg.com/eonasdan-bootstrap-datetimepicker@4.17.47/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://unpkg.com/vue-bootstrap-datetimepicker"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('070f3ca82259b2c85a65', {
      cluster: 'us2',
      encrypted: true
    });

    var channel = pusher.subscribe('notifications');
    channel.bind('App\\Events\\NotificationEvent', function(data) {
        $.notify({
            icon: "ti-bell",
            title: data.notification.title,
            message: data.notification.message,
            url: data.notification.url
        },{
            type: data.notification.type,
            timer: 4000,
            allow_dismiss: true,
            placement: {
                from: 'top',
                align: 'right',
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp',
            },
        });
    });
  </script>

</body>

</html>
