@extends('shared.master', ['active_tab'=>'users', 'breadcrumbs'=>['Usuarios']])

@section('css-bottom')
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/users.css">
@endsection

@section('content')
    {{-- CONTENT APP --}}
    <div class="container">
        <div class="row">
            {{-- USER CARD --}}
            @for ($i = 0; $i < 30; $i++)
            {{-- <div class="col-lg-4 col-md-6 col-sm-12"> --}}
            <div class="col-lg-4 col-md-6 col-12">
                <div class="z-card">
                    <div class="z-card-body user-card">
                        <div class="d-flex">
                            <div class="avatar d-flex justify-content-center align-items-center">
                                <span class="avatar-user size-lg circle" style="color:#AC3EFF; background-color:#AC3EFF25">JMZ</span>
                            </div>
                            <div class="col d-flex justify-content-center flex-column user-details">
                                <h3 class="z-text-center">Josemi Ruiz Lopez</h3>
                                <p class="z-text-center">josemiz95@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <div class="role d-flex justify-content-center">
                                <div class="z-badge success">Admin</div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center col user-links">
                                <a href=""><ion-icon class="z-color-primary z-font-size-24 me-2" name="eye-outline"></ion-icon></a>
                                <a href=""><ion-icon class="z-color-secondary z-font-size-24 my-2"  name="stopwatch-outline"></ion-icon></a>
                                <a href=""><ion-icon class="z-color-success z-font-size-24 ms-2" name="checkmark-circle-outline"></ion-icon></a>
                                {{-- <ion-icon class="z-color-warning z-font-size-24" name="close-circle-outline"></ion-icon> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection

@section('script')
@endsection