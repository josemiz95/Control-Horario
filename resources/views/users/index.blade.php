@extends('shared.master', ['active_tab'=>'users', 'breadcrumbs'=>['Usuarios']])

@section('css-bottom')
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/users.css">
@endsection

@section('content')
    {{-- CONTENT APP --}}
    <div class="container">
        <div class="row" id="users-container">
            {{-- USER CARD --}}
            
        </div>
    </div>
@endsection

@section('script')
<script src="{{config('app.url')}}/js/users/users.js"></script>
@endsection