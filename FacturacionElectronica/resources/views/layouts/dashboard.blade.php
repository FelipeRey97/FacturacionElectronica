<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main>

        <section class="dashboard">

        <div class="dashboardMenu">
            @auth
            <p>Hola {{ auth()->user()->name }}</p>
            @endauth
            <a href="{{route ('mainPage')}}">Mis Facturas</a>
            <a href="{{route ('invoiceRegister')}}">Nueva Factura</a>
            <a href="{{route ('logout')}}">Cerrar Sesión</a>

        </div>

        <div class="dashboardView">
            @yield('content')
            
        </div>

    </section>
    </main>
</body>
</html>