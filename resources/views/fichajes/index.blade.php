@extends('shared.master', ['active_tab'=>'checks', 'breadcrumbs'=>['Fichajes']])

@section('css-bottom')
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/users.css">
@endsection

@section('content')
    {{-- CONTENT APP --}}
    <div class="container">
        <div class="z-card">
            <div class="z-card-body d-flex flex-wrap">
                <div class="z-form-group m-2">
                    <select name="user" id="users-select">
                        <option value="1">Josemi</option>
                    </select>
                </div>
                <div class="z-form-group m-2">
                    <input type="date" id="checks-date" name="date" value="{{date('Y-m-d')}}">
                </div>
            </div>
        </div>

        <div class="z-card">
            <div class="z-card-header">
                <h2>Fichajes:</h2>
            </div>
            <div class="z-card-body">

            </div>
        </div>
    </div>
@endsection

@section('script')
{{-- Components --}}


{{-- Scripts --}}

@endsection