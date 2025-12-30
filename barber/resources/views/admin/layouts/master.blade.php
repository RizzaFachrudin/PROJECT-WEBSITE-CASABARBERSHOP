<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Dashboard - Admin Area')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    {{-- Menggunakan asset() untuk path publik --}}
    <link rel="shorcut icon" type="image/png" href="{{ asset('admin/img/logox.png') }}" />
    
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    
    {{-- Autentikasi PHP native digantikan oleh middleware Laravel --}}
    {{-- Pastikan route yang memanggil view ini terlindungi oleh middleware 'auth:admin' --}}
    
    {{-- Header (Menggantikan bagian Header) --}}
    @include('admin.layouts.header') 

    {{-- Sidebar (Menggantikan bagian Sidebar) --}}
    @include('admin.layouts.sidebar')

    <main id="main" class="main">
        {{-- Konten Dashboard di-inject di sini --}}
        @yield('content')
    </main>
    
    {{-- Footer (Menggantikan include'inc/footer.php') --}}
    @include('admin.layouts.footer') 

    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>