<!DOCTYPE html>
<html lang="en">
<head>
@include('website.includes.head')
<title>Supervisor System - @yield('title')</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
            @yield('pagecontent')
        </div>
            <!-- content-wrapper ends -->
    </div>
            <!-- page-body-wrapper ends -->
</div>
@include('website.includes.singleAllScripts')
</body>
</html>