<html>
<head>
    <title>Laravel project</title>
    <style>
        body {
            color: black;
        }
        .is-invalid {
            border-color: red;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="">
    @stack('styles')
</head>
<body>
<div class="container">
    <h1>
        @section('header')
            Laravel project
        @show
    </h1>
    <div class="content">
        @yield('content')
    </div>
</div>
@stack('scripts')
</body>
</html>
