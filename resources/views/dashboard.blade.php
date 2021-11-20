@extends('shared.master')

@section('css-bottom')
    
@endsection

@section('content')
    {{-- Menu --}}
    <div class="navContainer" id="navContainer">
        <div class="topContainer">
            <a href="https://www.google.com/"><img src="{{config('app.url')}}/images/Logo.png" class="logo"></a>
        </div>
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
            <div> {{-- Left --}}
                {{-- Toggle button --}}
                <div class="toggle" id="menuToggle"><ion-icon name="caret-back-outline"></ion-icon></div>
                {{-- User --}}
                <div class="breadcrumb">
                    <ul>
                        <li>Home</li>
                        <li>Usuarios</li>
                    </ul>
                </div>
            </div>

            <div> {{-- Rigth --}}
                <div class="settings">
                    <span class="option" ><ion-icon class="option" name="settings-outline"></ion-icon></span>
                    <span class="option" id="colorsToggle"><ion-icon name="moon-outline"></ion-icon></span>
                </div>
                <div class="user">
                    <span class="avatar-user circle" style="color:#AC3EFF; background-color:#AC3EFF25">JMZ</span>
                </div>
                
            </div>
        </div>

        <div class="content">
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
                                    <div class="z-form-group col-12">
                                        <label for="">textarea</label>
                                        <textarea name="" id="" cols="30" rows="5"></textarea>
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