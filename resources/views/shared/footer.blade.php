{{-- VARIABLE SCRIPTS --}}
<script>
    let app_url = '{{ config('app.url') }}';
</script>

@yield('script') {{-- SCRIPT DE PLUGINS --}}

<script src="{{config('app.url')}}js/app.js"></script>

@yield('script-bottom') {{-- SCRIPT DE PAGINA --}}

