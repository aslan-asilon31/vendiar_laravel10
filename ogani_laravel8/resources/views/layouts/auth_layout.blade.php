<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Custom styles-path -->
    <link rel="stylesheet" href="{{ asset('auth-assets/css/style.css') }}">

    <!-- Font Awesome kit script -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- Google Fonts Open Sans-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/assets/img/favicon-dark.png') }}">
</head>

<body>

    @yield('content')
    <script type="text/javascript" src="{{ asset('auth-assets/js/main.js') }}"></script>


    @stack('js')
</body>

</html>