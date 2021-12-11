<div class="navContainer" id="navContainer">
    <div class="topContainer">
        <a href="https://www.google.com/"><img src="{{config('app.url')}}/images/Logo.png" class="logo"></a>
    </div>
    <ul id="navMenu">
        <li {{isset($active_tab) && strtolower($active_tab) == 'home' ? 'class=active':''}}>
            <a href="{{route('web.dashboard')}}">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Home</span>
            </a>
        </li>
        @if (Auth::user()->hasAccess('users'))
            <li  {{isset($active_tab) && strtolower($active_tab) == 'users' ? 'class=active':''}}>
                <a href="{{route('web.users')}}">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">Usuarios</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->hasAccess('checks'))
            <li  {{isset($active_tab) && strtolower($active_tab) == 'checks' ? 'class=active':''}}>
                <a href="{{route('web.checks')}}">
                    <span class="icon"><ion-icon name="stopwatch-outline"></ion-icon></span>
                    <span class="title">Fichajes</span>
                </a>
            </li>
        @endif
    </ul>
</div>