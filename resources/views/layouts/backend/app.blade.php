<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('public/backend/images/admin-favicon.ico') }}" type="image/x-icon">
  <title> @yield('title') | AdminLTE 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/css/all.min.css')}}">
  <!-- data Tables -->
  <link rel="stylesheet" href="{{asset('public/backend/css/dataTables/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/dataTables/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/sweetalert2.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/css/adminlte.min.css')}}">
  <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">
  
  @yield('style')
  <style>
    .img-profile {
      width: 2rem;
      height: 2rem;
    }
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('layouts.backend.partial.header')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
      <img src="{{ asset('public/backend/images/admin-logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

@include('layouts.backend.partial.sidebar')


    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('page_name')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcumb')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">

        @yield('main_content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.backend.partial.footer')


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
<!-- Data Tables -->
<script src="{{asset('public/backend/js/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Data Tables Button-->
<script src="{{asset('public/backend/js/dataTables-buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables-buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables-buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/backend/js/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/backend/js/pdfmake/vfs_fonts.js')}}"></script>
<!-- Sweet alert -->
<script src="{{asset('public/backend/js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('public/js/iziToast.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/js/adminlte.min.js')}}"></script>
@include('vendor.lara-izitoast.toast')

<script>
  $("#dataTables").DataTable();
  function deleteData(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-'+id).submit()
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
}
</script>
@yield('script')
</body>
</html>
