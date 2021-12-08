@extends('shared.master', ['active_tab'=>'checks', 'breadcrumbs'=>['Fichajes']])

@section('css-bottom')
    <link rel="stylesheet" href="{{config('app.url')}}/css/pages/checks.css">
@endsection

@section('content')
    {{-- CONTENT APP --}}
    <div class="container">
        <div class="z-card">
            <form id="form-checks">
                <div class="z-card-body d-flex flex-wrap">
                    <div class="z-form-group m-2">
                        <select name="user" id="users-select">
                        </select>
                    </div>
                    <div class="z-form-group m-2">
                        <input type="date" id="checks-date" name="date" value="{{date('Y-m-d')}}">
                    </div>
                    <button type="submit" class="z-button primary hover m-2">Obtener fichajes</button>
                </div>
            </form>
        </div>

        <div class="z-card">
            <div class="z-card-header">
                <h2>Tramos: <div class="z-badge info sm" id="totalTime">00:00:00</div></h2>
            </div>
            <div class="z-card-body" id="checksContainer">
            </div>
        </div>
    </div>
@endsection

@section('script')
{{-- Components --}}
<script src="{{config('app.url')}}/js/components/checks/check-accordion.js"></script>


{{-- Scripts --}}
<script src="{{config('app.url')}}/js/checks/checks.js"></script>
@endsection