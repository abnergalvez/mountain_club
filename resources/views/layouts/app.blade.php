<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{url('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/responsive.bootstrap.min.css')}}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript" src="{{url('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/dataTables.fixedHeader.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/responsive.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/multiselect.min.js')}}"></script>

    <style media="screen">
      body {
      /**background: url("{{url('img/piramide.jpg')}}") no-repeat center center fixed;**/
      background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
    }
  </style>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        $(document).ready(function() {
             var table = $('.datatable').DataTable({
                 responsive: true
                });
                new $.fn.dataTable.FixedHeader( table );

                $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div id="app">

        @include('layouts.nav_menu')

        @yield('content')
    </div>

</body>
</html>
