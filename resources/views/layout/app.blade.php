<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>
        @yield('title')
    </title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" />
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <style>
    body {
        padding: 20px;
    }
    .navbar {
        margin-bottom: 20px;
    }
    </style>

</head>
<body>
    <div class="container">
        @component('components.navbar', ["current" => $current])
        @endcomponent
        <main role="main">
        @hasSection('body')
            @yield('body')
        @endif
    </div>

    @hasSection('javascript')
        @yield('javascript')
    @endif

</body>
</html>