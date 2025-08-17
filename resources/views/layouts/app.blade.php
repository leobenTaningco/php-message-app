<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>@yield('title', 'MyApp')</title>
</head>
<body style="background-color: #D8E9EF;">

    <header class="sticky top-0 z-50">
        @include('partials.header')
    </header>

    <main class="flex w-full h-full container mx-auto py-8">
        @yield('content')
    </main>

</body>
</html>
