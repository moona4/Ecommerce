<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AmrapaliCottage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('back.layouts.partial.styles')
    @stack('custom-styles')
</head>

<body>
    @if (Request::is('admin/login', 'logout'))
        @yield('content')
    @else
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @include('back.layouts.partial.navbar')
                @include('back.layouts.partial.sidebar')
            </nav>
            @yield('content')
            @include('back.layouts.partial.footer')
            @include('back.layouts.partial.scripts')
        </div>

        @stack('custom-scripts')

    @endif
</body>

</html>

