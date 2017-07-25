<!DOCTYPE html>
<html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>

    @include('users.layouts.navbar')

    <body>
        <div class="container">
            <div class="row">
                @include('layouts.flash')
                @yield('body')
            </div>
        </div>
    </body>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
