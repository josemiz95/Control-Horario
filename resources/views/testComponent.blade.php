@extends('shared.master', ['active_tab'=>'home', 'breadcrumbs'=>['Home']])

@section('css-bottom')
    
@endsection

@section('content')
    
            {{-- CONTENT APP --}}
    <div class="container-fluid">
        <div class="row">

            <div class="col-2">
                <div class="z-card">
                    <div class="z-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h2>234</h2>
                                <p>Algo</p>
                            </div>
                            <div class="z-card-icon"><ion-icon name="moon-outline"></ion-icon></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="z-card">
                    <div class="z-card-header">
                        <h3>Titulo de Card</h3>
                    </div>
                    <div class="z-card-body">
                        <table class="z-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Dato 1</th>
                                    <th>Dato 2</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="z-card">
                    <div class="z-card-header">
                        <h3>Titulo de Card</h3>
                    </div>
                    <div class="z-card-body">
                        <div class="row">
                            <div class="z-form-group col-6">
                                <label for="">Text</label>
                                <input type="text">
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">Select</label>
                                <select name="" id="">
                                    <option value="Opcion">opcion</option>
                                </select>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">date</label>
                                <input type="date">
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">number</label>
                                <input type="number">
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">checkbox</label>
                                <label class="z-check">
                                    <label for="checkbox">One</label>
                                    <input type="checkbox" checked="checked" id="checkbox">
                                    <span></span>
                                </label>
                                <label class="z-check">
                                    <label for="checkbox1">One1</label>
                                    <input type="checkbox" id="checkbox1">
                                    <span></span>
                                </label>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">radio</label>
                                <label class="z-check">
                                    <label for="radio1">One</label>
                                    <input type="radio" name="radio" id="radio1" checked="checked">
                                    <span></span>
                                </label>
                                <label class="z-check">
                                    <label for="radio2">One</label>
                                    <input type="radio" name="radio" id="radio2">
                                    <span></span>
                                </label>
                            </div>
                            <div class="z-form-group col-12">
                                <label for="">textarea</label>
                                <textarea name="" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col12">
                                <button class="z-button primary hover">Boton</button>
                                <button class="z-button secondary hover">Boton</button>
                                <button class="z-button success hover">Boton</button>
                                <button class="z-button danger hover">Boton</button>
                                <button class="z-button warning hover">Boton</button>
                                <button class="z-button info hover">Boton</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="z-card">
                    <div class="z-card-header">
                        <h3>Titulo de Card</h3>
                    </div>
                    <div class="z-card-body">
                        <div class="row">
                            <div class="z-form-group col-6">
                                <label for="">Text</label>
                                <input type="text" disabled>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">Select</label>
                                <select name="" id="" disabled>
                                    <option value="Opcion">opcion</option>
                                </select>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">date</label>
                                <input type="date" disabled>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">number</label>
                                <input type="number" disabled>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">checkbox</label>
                                <label class="z-check">
                                    <label for="checkbox">One</label>
                                    <input type="checkbox" checked="checked" id="checkbox" disabled>
                                    <span></span>
                                </label>
                                <label class="z-check">
                                    <label for="checkbox1">One1</label>
                                    <input type="checkbox" id="checkbox1" disabled>
                                    <span></span>
                                </label>
                            </div>
                            <div class="z-form-group col-6">
                                <label for="">radio</label>
                                <label class="z-check">
                                    <label for="radio1">One</label>
                                    <input type="radio" name="radioD" id="radio1" disabled>
                                    <span></span>
                                </label>
                                <label class="z-check">
                                    <label for="radio2">One</label>
                                    <input type="radio" name="radioD" id="radio2" checked disabled>
                                    
                                    <span></span>
                                </label>
                            </div>
                            <div class="z-form-group col-12">
                                <label for="">textarea</label>
                                <textarea name="" id="" cols="30" rows="5" disabled></textarea>
                            </div>
                            <div class="col12">
                                <button class="z-button primary hover" disabled>Boton</button>
                                <button class="z-button secondary hover" disabled>Boton</button>
                                <button class="z-button success hover" disabled>Boton</button>
                                <button class="z-button danger hover" disabled>Boton</button>
                                <button class="z-button warning hover" disabled>Boton</button>
                                <button class="z-button info hover" disabled>Boton</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="z-card">
                    <div class="z-card-body">
                        <div class="z-alert primary"> ALERT </div>
                        <div class="z-alert secondary"> ALERT </div>
                        <div class="z-alert success"> ALERT </div>
                        <div class="z-alert warning"> ALERT </div>
                        <div class="z-alert danger"> ALERT </div>
                        <div class="z-alert info"> ALERT </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
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
                                <div>29</div><div>30</div><div>31</div><div></div><div></div><div class="z-calendar-weekend"></div><div class="z-calendar-weekend"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="z-card">
                    <div class="z-card-body">
                        <div class="z-accordion z-active">
                            <a class="z-accordion-header">Accordion #1</a>
                            <div class="z-accordion-body">
                                CONTENIDO
                            </div>
                        </div>

                        <div class="z-accordion">
                            <a class="z-accordion-header">Accordion #2</a>
                            <div class="z-accordion-body">
                                CONTENIDO
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="z-modal z-modal-lg">
                <div class="z-modal-contentainer">
                    <div class="z-modal-header">
                        <h2>Titulo del modal</h2>
                        <button class="z-modal-close"><ion-icon name="close-outline"></ion-icon></button>
                    </div>
                    <div class="z-modal-body">
                        ad
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