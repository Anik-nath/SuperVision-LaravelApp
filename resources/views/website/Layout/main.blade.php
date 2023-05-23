<!DOCTYPE html>
<html lang="en">
<head>
  @include('website.includes.head')
</head>
<body>
  <div class="container-scroller">
    <!-- navbar -->
    @include('website.includes.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- sidebar -->
      @include('website.includes.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <!-- content-wrapper start -->
        @yield('main-content')
        <!-- content-wrapper ends -->
        <!-- Footer start -->
        @include('website.includes.footer')
        <!-- Footer end -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @include('website.includes.scripts')
</body>
</html>

