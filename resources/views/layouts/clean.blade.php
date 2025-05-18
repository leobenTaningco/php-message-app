<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>@yield('title', 'MyApp')</title>
</head>
<body class="bg-gray-100">

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>
</html>
