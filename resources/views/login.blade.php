<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title', 'Control Horario') </title>
    <link rel="icon" type="image/png" href="{{ config('app.url') }}/images/icon.png"/>
    <link rel="shortcut icon" href="{{ config('app.url') }}/images/icon.png">
    {{-- Boostrap Grid --}}
    <link rel="stylesheet" href="{{config('app.url')}}/lib/boostrap/bootstrap-grid.min.css">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{config('app.url')}}/css/colors.css" id="colors-css">
    <link rel="stylesheet" href="{{config('app.url')}}/css/app.css">
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/login.css">
</head>

<body data-sidebar="dark">
    <div class="container-fluid">
        <section class="row">
            <div class="imgBox col-12 col-lg-7">
                <img src="{{config('app.url')}}/images/login.jpg" alt="" srcset="">
            </div>
            <div class="contentBox col-12 col-lg-5">
                <div class="formBox">
                    <h2>Iniciar sesión</h2>
                    <form id="login-form">
                        <div class="inputBox">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="inputBox">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Entrar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    
    <script>
        const app = {
            url: '{{config('app.url')}}'
        }
    </script>
    <script src="{{config('app.url')}}/js/classes.js"></script>
    <script src="{{config('app.url')}}/js/login.js"></script>
</body>
</html>