@props([
	'title',
	'h1' => null
])

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ @mix('/css/app.css') }}">
    </head>
    <body>
        <header>
            <div class="container mt-1 pb-4">
                <div class="col-md-12">
                    <div class="row mt-5">
                        <div class="mt-1 pb-4 col-md-2">
                            Logo
                        </div>
                        @auth
                            <div class="col-md-1 offset-md-9">
                                <form method="post" action="{{ route('auth.sessions.destroy') }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Выйти</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <div>
            <div class="container">
                <h1>{{ $h1 ?? $title }}</h1>
                {{ $slot }}
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
