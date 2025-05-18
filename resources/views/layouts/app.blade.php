<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>@yield('title', 'MyApp')</title>
</head>
<body style="background-color: #D8E9EF;">

    @include('partials.header')

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>
</html>
