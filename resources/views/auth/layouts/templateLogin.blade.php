<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LAMP 2 - Dashboard</title>

        <!-- Custom fonts for this template-->

        <!-- Custom styles for this template-->

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{asset('auth/css/style.css')}}">
    </head>
    <style>
    .background-image {
        background-image: url('auth/images/por-do-sol-fazenda.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100vh;
    }
    </style>


    <body class="background-image">
        @yield('content')
    </body>


    
</html>