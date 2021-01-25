<html lang="en">
    @include('layouts.header')

    <head>
        <title>@yield('title')</title>
    </head>

    <!-- <body> -->
        <div align="center">
            @yield('content')
        </div>
    @include('layouts.footer')
    </body>

</html>
