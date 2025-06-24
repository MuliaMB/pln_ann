@extends('auth.layout') {{-- ganti sesuai layout kamu --}}

@section('content')
<div class="container text-center mt-5">
    <h1 class="mb-5">DASHBOARD</h1>

    <div class="row justify-content-center">
        <div class="col-md-2 m-2">
            <a href="#" class="btn btn-outline-dark w-100 p-4 rounded">
                <i class="bi bi-bar-chart-line fs-3 mb-2 d-block"></i>
                VIEW USAGE DATA
            </a>
        </div>
        <div class="col-md-2 m-2">
            <a href="#" class="btn btn-outline-dark w-100 p-4 rounded">
                <i class="bi bi-upload fs-3 mb-2 d-block"></i>
                UPLOAD NEW DATA
            </a>
        </div>
        <div class="col-md-2 m-2">
            <a href="#" class="btn btn-outline-dark w-100 p-4 rounded">
                <i class="bi bi-graph-up fs-3 mb-2 d-block"></i>
                LOAD FORECASTING
            </a>
        </div>
        <div class="col-md-2 m-2">
            <a href="#" class="btn btn-outline-dark w-100 p-4 rounded">
                <i class="bi bi-gear fs-3 mb-2 d-block"></i>
                SETTINGS
            </a>
        </div>
    </div>
</div>
@endsection
