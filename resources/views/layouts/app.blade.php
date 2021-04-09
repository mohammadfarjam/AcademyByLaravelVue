<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Academy</title>


{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<div id="app">
    <div class="container-fluid p-0 m-0">
        @yield('content')
        <router-view/>

    </div>
    {{--    container--}}

</div>

<!-- Scripts -->


<script src="{{ asset('/js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
