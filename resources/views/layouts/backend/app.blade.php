@include('layouts.backend.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Top Navbar -->
@include('layouts.backend.topheader')
<!-- Top Navbar end -->
<!-- Main Sidebar Container -->
@include('layouts.backend.sidebar')
<!-- Main Sidebar Container end -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
@yield('content')
<!--content-wrapper -->
@include('layouts.backend.footer')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
</aside>
<!--control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layouts.backend.script')
</body>
</html>
