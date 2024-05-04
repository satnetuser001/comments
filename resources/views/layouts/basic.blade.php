<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/styles/main.css">
</head>
<body>
    <header>
        <div class="logo">Сomment me!</div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>