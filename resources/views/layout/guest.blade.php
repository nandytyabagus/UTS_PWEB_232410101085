<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <main>
        @yield('content')
    </main>
    @stack('scripts')
</body>

</html>
