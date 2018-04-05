<!doctype html>
<html lang="en" class="perfect-scrollbar-on">
    @include('layouts.header')
<body>
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            @include('layouts.headernavbar')
                @yield('content')
            @include('layouts.footer')
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -97px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
            <div class="ps-scrollbar-y-rail" style="top: 100px; height: 494px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 42px; height: 210px;"></div></div>
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

    <!--  Select Picker Plugin -->
    <script src="/js/bootstrap-selectpicker.js"></script>

    <!--  Switch and Tags Input Plugins -->
    <script src="/js/bootstrap-switch-tags.js"></script>

    <!-- Circle Percentage-chart -->
    <script src="/js/jquery.easypiechart.min.js"></script>

    <!--  Charts Plugin -->
    <script src="/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/js/bootstrap-notify.js"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="/js/sweetalert2.js"></script>

    <!-- Vector Map plugin -->
    <script src="/js/jquery-jvectormap.js"></script>

    <!-- Wizard Plugin    -->
    <script src="/js/jquery.bootstrap.wizard.min.js"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="/js/bootstrap-table.js"></script>

    <!--  Plugin for DataTables.net  -->
    <script src="/DataTables/datatables.js"></script>

    <!--  Full Calendar Plugin    -->
    <script src="/js/fullcalendar.min.js"></script>

    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="/js/paper-dashboard.js?v=1.2.1"></script>

    <!--   Sharrre Library    -->
    <script src="/js/jquery.sharrre.js"></script>
</body>

</html>