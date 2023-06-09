<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4 py-2">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>
            <a href="{{route('logout')}}">logout</a>
        </div>
    </nav>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @isset($mensagemSucesso)
        <div class="alert alert-success my-2">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    {{ $slot }}
</body>
</html>
