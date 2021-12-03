@extends('shared.master', ['active_tab'=>'home', 'breadcrumbs'=>['Home']])

@section('css-bottom')
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/dashboard.css">
@endsection

@section('content')
    
    {{-- CONTENT APP --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="z-card">
                    <div class="z-card-header">
                        <h2>Fichar</h2>
                    </div>
                    <div class="z-card-body">
                        {{-- <div class="d-flex align-items-center justify-content-center">
                            <a class="z-button btn-checkio in"><ion-icon name="play-outline"></ion-icon></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pt-2">
                            <h3>Entrar</h3>
                        </div> --}}

                        <div class="d-flex align-items-center justify-content-center">
                            <a class="z-button btn-checkio out"><ion-icon name="stop-outline"></ion-icon></ion-icon></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pt-2">
                            <h3>Salir</h3>
                        </div>

                        <div>
                            <ul class="z-time-line">
                                <li>
                                    <div class="checkContainer">
                                        <div class="time">10:30</div>
                                        <div class="z-badge success">Iniciar</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkContainer">
                                        <div class="time">10:00</div>
                                        <span class="z-badge danger">Finalizar</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkContainer">
                                        <div class="time">09:00</div>
                                        <span class="z-badge success">Iniciar</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="container-fluid">
                    <div class="row">

                        <z-widget-leavedays amount="30" class="col-4"></z-widget-leavedays>

                        <z-widget-calendar class="col-4"></z-widget-calendar>

                        <z-widget-clock class="col-4"></z-widget-clock>

                        <z-calendar date="{{date('Y-m-d')}}" year="{{date('Y')}}" month="{{date('m')}}" class="col-12"></z-calendar>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Components --}}
    <script src="{{config('app.url')}}/js/components/dashboard/calendar.js"></script>
    <script src="{{config('app.url')}}/js/components/dashboard/widgets.js"></script>
@endsection