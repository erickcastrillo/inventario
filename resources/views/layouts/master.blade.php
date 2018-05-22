<!doctype html>
<html lang="en">
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


<!--  Forms Validations Plugin -->
<script src="/js/jquery.validate.min.js"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="/js/es6-promise-auto.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="/js/bootstrap-datetimepicker.js"></script>


<!--  Notifications Plugin    -->
<script src="/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="/js/sweetalert2.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="/DataTables/datatables.js"></script>

<script src="/js/paper-dashboard.js"></script>

<script src="//js.pusher.com/2.2/pusher.min.js"></script>

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