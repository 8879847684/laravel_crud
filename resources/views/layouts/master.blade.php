<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Transportation</title>
    <link href="{{ asset('public/css/light.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/css/flatpickr.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        @if( Route::getCurrentRoute()->uri !== '/' && Route::getCurrentRoute()->uri !== 'login' )
            @include('layouts.sidebar')
        @endif
        <div class="main">
            @if( Route::getCurrentRoute()->uri !== '/' && Route::getCurrentRoute()->uri !== 'login' )
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle">
                        <i class="hamburger align-self-center"></i>
                    </a>
                </nav>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/js/flatpickr.js') }}"></script>
    <script type="text/javascript">
         var baseUrl = "{{ url('/') }}";
         var segment1 = "{{ !empty(Request::segment(1)) ? Request::segment(1): ''; }}";
         var segment2 = "{{ !empty(Request::segment(2)) ? Request::segment(2): ''; }}";
         var segment3 = "{{ !empty(Request::segment(3)) ? Request::segment(3): ''; }}";
     </script>
    <script src="{{ asset('public/js/main.js?ver=' . time()) }}"></script>
</body>
</html>