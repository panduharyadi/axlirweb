<!doctype html>
<html lang="en">

<head>
  @include('backend.components.header')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('backend.components.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('backend.components.navbar')
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        
        @yield('content')
        
        @include('backend.components.footer')
      </div>
    </div>
  </div>

  @include('backend.components.js')
</body>

</html>