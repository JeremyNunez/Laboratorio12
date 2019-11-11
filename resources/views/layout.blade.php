<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontakte</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic.min.css') }}">
    <script src="https://kit.fontawesome.com/23896d1f6a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="ui container" style="margin-top: 10px;">
    <div class="ui secondary  menu">
        <a class="item" href="{{ route('contacto.index') }}">
            Inicio
        </a>
        <a class="item" href="{{ route('contacto.create') }}">
            Nuevo
        </a>
        <div class="right menu">
            <div class="item">
                <form class="ui form" action="{{ route('contacto.search') }}" method="POST">
                    @csrf
                    <div class="ui icon input">
                        <input type="text" name="nombre-contacto" placeholder="Buscar...">
                        <i class="search link icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ui two column centered grid">
        <div class="four column centered row">
            @yield('content')
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<script src="{{ asset('semantic.min.js') }}"></script>
@yield('extra-scripts')
</body>
</html>
