<!doctype html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>KRL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="KRL" name="description" />
        <meta content="ASK Innovations" name="ASK Innovations" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/images/logo.png') }}">

        <!-- Plugin CSS -->
        <link href="{{ asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- Preloader CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/preloader.min.css') }}" type="text/css" />

        <!-- Bootstrap CSS -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Icons CSS -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
            type="text/css" />
        <!-- plugin css -->
        <link href="{{ asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
            type="text/css" />
            <link rel="stylesheet" href="{{ asset('backend/css/preloader.min.css')}}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    
    <link rel="shortcut icon" href="{{ asset('backend/images/logo.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('backend/css/preloader.min.css') }}" type="text/css" />
    
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- App Css-->
    <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    
    </head>

    <body>




        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

        {{-- Navbar start --}}
        @include('admin.layouts.navbar')
        {{-- Navbar start --}}
        {{-- Sidebar start --}}
        @include('admin.layouts.sidebar')
        {{-- Sidebar end --}}
         
            <div class="main-content">
            {{-- Content start --}}
                @yield('content')
                {{-- Content end --}}
                {{-- Footer start --}}
            @include('admin.layouts.footer')
            {{-- Footer end --}}
            </div>
            
        </div>
        <!-- END layout-wrapper -->

        <script>
            // Auto-remove alerts after 4 seconds
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.querySelectorAll('.auto-dismiss').forEach(alert => {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    });
                }, 4000);
            });
            $(document).ready(function() {
    $('#datatable').DataTable();
});
        </script>
        
      
        
</body>

</html>