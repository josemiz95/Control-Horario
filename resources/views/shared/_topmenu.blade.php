<div class="topbar">
    <div> {{-- Left --}}
        {{-- Toggle button --}}
        <div class="toggle" id="menuToggle"><ion-icon name="caret-back-outline"></ion-icon></div>
        {{-- User --}}
        <div class="breadcrumb">
            @if (isset($breadcrumbs) && is_array($breadcrumbs))
                <ul>
                    @foreach ($breadcrumbs as $crumb)
                        <li>{{$crumb}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div> {{-- Rigth --}}
        <div class="settings">
            <span class="option" id="colorsToggle"><ion-icon name="moon-outline"></ion-icon></span>
        </div>
        <div class="user">
            <span class="avatar-user size-sm circle" style="color:#AC3EFF; background-color:#AC3EFF25">JMZ</span>
        </div>
        <div class="settings">
            <a class="option z-color-danger" href="{{route('login')}}"><ion-icon name="power-outline"></ion-icon></a>
        </div>
    </div>
</div>