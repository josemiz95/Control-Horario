{{-- VARIABLE SCRIPTS --}}
<script>
    const app = {
        url: '{{ config('app.url') }}'
    };
</script>

<script src="{{config('app.url')}}/js/classes.js"></script>
<script src="{{config('app.url')}}/js/app.js"></script>

@yield('script') {{-- SCRIPT DE PLUGINS --}}

{{-- Iconos --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@yield('script-bottom') {{-- SCRIPT DE PAGINA --}}

