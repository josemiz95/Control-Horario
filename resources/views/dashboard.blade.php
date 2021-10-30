@extends('shared.master')

@section('css-bottom')
    
@endsection

@section('content')
    {{-- Menu --}}
    <div class="navContainer" id="navContainer">
        <div class="logoContainer"></div>
        <ul id="navMenu">
            <li>
                <a href="">
                    <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                    <span class="title">Titulo</span>
                </a>
            </li>
            <li class="active" id="actual">
                <a href="">
                    <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                    <span class="title">Titulo</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                    <span class="title">Titulo</span>
                </a>
            </li>
        </ul>
    </div>

    {{-- Main --}}
    <div class="appContainer" id="appContainer">
        <div class="topbar">
            {{-- Toggle button --}}
            <div class="toggle" id="menuToggle"><ion-icon name="menu-outline"></ion-icon></div>
            {{-- User --}}
            <div class="user">
                <span class="avatar-user circle" style="color:#AC3EFF; background-color:#AC3EFF25">JMZ</span>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const actualMenu = "actual";
    </script>
@endsection