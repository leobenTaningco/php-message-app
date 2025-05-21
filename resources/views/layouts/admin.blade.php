<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>@yield('title', 'MyApp')</title>
</head>
<body class="background-color: #D8E9EF;">

    <main class="flex w-full h-full container mx-auto py-8">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
