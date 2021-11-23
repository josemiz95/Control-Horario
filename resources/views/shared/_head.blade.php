<link rel="stylesheet" href="{{config('app.url')}}/lib/boostrap/bootstrap-grid.min.css">

@yield('css') {{-- CSS DE PLUGINS --}}

<link rel="stylesheet" href="{{config('app.url')}}/css/colors.css" id="colors-css" data-type="ligth">
<link href="{{ config('app.url') }}/css/app.css" rel="stylesheet" type="text/css" />

@yield('css-bottom') {{-- CSS DE PAGINA --}}