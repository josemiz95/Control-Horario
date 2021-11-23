<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> @yield('title', 'Control Horario') </title>
        <link rel="icon" type="image/png" href="{{ config('app.url') }}/images/icon.png"/>
        <link rel="shortcut icon" href="{{ config('app.url') }}images/icon.png">

        @include('shared._head')
    </head>
    <body data-sidebar="dark">
        {{-- Menu --}}
        @include('shared._sidemenu')

        {{-- Main --}}
        <div class="appContainer" id="appContainer">
            @include('shared._topmenu')

            <div class="content">
                @yield('content')
            </div>
        </div>
        
        @include('shared._footer')
    </body>
</html>