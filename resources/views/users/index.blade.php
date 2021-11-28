@extends('shared.master', ['active_tab'=>'users', 'breadcrumbs'=>['Usuarios']])

@section('css-bottom')
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/users.css">
@endsection

@section('content')
    {{-- CONTENT APP --}}
    <div class="container">
        <div class="z-card">
            <div class="z-card-body d-flex justify-content-center align-items-center flex-wrap justify-content-md-between">
                <button class="z-button primary hover m-2" id="new-user-btn">Nuevo usuario</button>
                <div class="z-form-group m-2">
                    <input type="text" id="search-input" name="name" placeholder="Buscar">
                </div>
            </div>
        </div>
        
        <div class="row" id="users-container">
            {{-- USER CARD --}}
        </div>
    </div>

    <z-user-form id="form-user-modal" title=""></z-user-form>
@endsection

@section('script')
{{-- Components --}}
    <script src="{{config('app.url')}}/js/components/users/user-card.js"></script>
    <script src="{{config('app.url')}}/js/components/users/user-form.js"></script>

{{-- Scripts --}}
    <script src="{{config('app.url')}}/js/users/users.js"></script>
@endsection