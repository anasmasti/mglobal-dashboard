<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MGlobale Dashboard</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
</head>
<style>
::-webkit-scrollbar {
  width: 5px;
}
::-webkit-scrollbar-track {
  background: #e7c4ff !important; 
}
::-webkit-scrollbar-thumb {
  background: #b77fff !important; 
}
::-webkit-scrollbar-thumb:hover {
  background: #cb7fff !important; 
}
::-webkit-scrollbar:horizontal {
    height: 5px !important;
}
</style>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/dashboard.js') }}" ></script>
<script src="{{ asset('js/file-upload.js') }}" ></script>
<script src="{{ asset('js/hoverable-collapse.js') }}" ></script>
<script src="{{ asset('js/misc.js') }}" ></script>
<script src="{{ asset('js/off-canvas.js') }}" ></script>
<script src="{{ asset('css/vendors/js/vendor.bundle.base.js') }}" ></script>
<script src="https://unpkg.com/vuejs-paginate@latest"></script>
</html>
