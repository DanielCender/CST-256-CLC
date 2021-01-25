<html lang="en">
    @include('layouts.LoggedInHeader')

    <head>
        <title>@yield('title')</title>
    </head>

    <body>
        <div>
            @yield('content')
        </div>
        <div class="container-fluid" style="margin: 1in;"></div>
    </body>

</html>
