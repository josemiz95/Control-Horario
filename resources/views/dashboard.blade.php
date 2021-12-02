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
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="z-button btn-checkio in"><ion-icon name="play-outline"></ion-icon></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pt-2">
                            <h3>Entrar</h3>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <a class="z-button btn-checkio out"><ion-icon name="stop-outline"></ion-icon></ion-icon></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pt-2">
                            <h3>Salir</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-4">
                            <div class="z-card">
                                <div class="z-card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h2>234</h2>
                                            <p>Vacaciones</p>
                                        </div>
                                        <div class="z-card-icon z-color-success"><ion-icon name="sunny-outline"></ion-icon></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="z-card">
                                <div class="z-card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2>01/12/2021</h2>
                                        <div class="z-card-icon z-color-danger"><ion-icon name="calendar-clear-outline"></ion-icon></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="z-card">
                                <div class="z-card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2>00:00</h2>
                                        <div class="z-card-icon z-color-secondary"><ion-icon name="time-outline"></ion-icon></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="z-card">
                                <div class="z-card-body">
                                    <div class="z-calendar">
                                        <div class="z-calendar-header">
                                            <div>Lun</div>
                                            <div>Mar</div>
                                            <div>Mie</div>
                                            <div>Jue</div>
                                            <div>Vie</div>
                                            <div>Sab</div>
                                            <div>Dom</div>
                                        </div>
                                        <div class="z-calendar-body">
                                            <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div class="z-calendar-weekend">6</div><div class="z-calendar-weekend">7</div>
                                            <div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div class="z-calendar-weekend">13</div><div class="z-calendar-weekend">14</div>
                                            <div>15</div><div>16</div><div>17</div><div class="z-calendar-today">18</div><div>19</div><div class="z-calendar-weekend">20</div><div class="z-calendar-weekend">21</div>
                                            <div>22</div><div>23</div><div>24</div><div>25</div><div>26</div><div class="z-calendar-weekend">27</div><div class="z-calendar-weekend">28</div>
                                            <div>29</div><div>30</div><div>31</div><div></div><div></div><div></div><div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const actualMenu = "actual";
    </script>
@endsection