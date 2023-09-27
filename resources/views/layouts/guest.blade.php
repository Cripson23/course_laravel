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
                <div class="col-md-12">
                    <div class="row mt-5">
                        <div class="col-md-2">
                            Logo
                        </div>
                        @auth
                            <div class="col-md-2 offset-md-6">
                                <a class="btn btn-secondary" href="{{ route('cars.index') }}">Панель управления</a>
                            </div>
                            <div class="col-md-2">
                                <form method="post" action="{{ route('auth.sessions.destroy') }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Выйти</button>
                                </form>
                            </div>
                        @else
                            <div class="col-md-2 offset-md-7">
                                <a class="btn btn-success" href="{{ route('auth.sessions.create') }}">Авторизация</a>
                            </div>
                            <div class="col-md-1 offset-md-0">
                                <a class="btn btn-primary" href="{{ route('auth.register.create') }}">Регистрация</a>
                            </div>
                        @endif
                    </div>
                </div>
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
