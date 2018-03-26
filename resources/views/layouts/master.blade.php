<!DOCTYPE html>
<html>
  <!--  Header content -->
  <!-- =================================================== -->
  @include('layouts.header')
  
    <!-- @App Content -->
    <!-- =================================================== -->
    <div>
    <!-- ### $App Screen Content ### -->
      <!-- #Left Sidebar ==================== -->
      @include('layouts.sidebar')

      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        @include('layouts.headernavbar')

        @yield('content')
        
        @include('layouts.footer')
      </div>
    </div>
  </body>
</html>
