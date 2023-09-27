<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ @mix('/css/app.css') }}">
    </head>
    <body>
        <header>
            <div class="container mt-1 pb-4">
                Logo
            </div>
        </header>
        <div>
            <div class="container">
                <h1>@yield('h1')</h1>
                @yield('content')
            </div>
        </div>
        <footer>
            <div class="container border-bottom pt-4">
                Footer
            </div>
        </footer>
        <script src="{{ @mix('/js/app.js') }}"></script>
    </body>
</html>
