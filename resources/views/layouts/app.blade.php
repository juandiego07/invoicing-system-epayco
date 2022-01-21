<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href={{ asset('css/epayco.css') }}>
    <link rel="shortcut icon" href={{ asset('img/favicon.png') }} type="image/x-icon">
    <title>@yield('title') :: Recaudo Online</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href={{ route('home') }}><img src={{ asset('img/logo.png') }} alt="log-epayco"
                    style="max-width: 150px; max-height: 200px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('customer') }}>Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('bill') }}>Facturación</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href={{ route('login.destroy') }}>Cerrar sesión</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('login') }}>Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('register') }}>Registrarse</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    @include('sweetalert::alert')

    <script src={{ asset('js/validation.js') }}></script>
</body>

</html>
