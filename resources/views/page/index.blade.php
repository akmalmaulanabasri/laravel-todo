@extends('page.layout')

@section('content')
    <div class="container mt-5">
        <div class="card py-5 mt-3"
            style="/* From https://css.glass */
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);">
            <h2 class="text-center text-light">Welcome to ToDo List</h2>
            <div class="card-body d-flex justify-content-center">
                <a href="/login" class="btn mx-3 btn-secondary">Login</a>
                <a href="/register" class="btn mx -3 btn-light">Register</a>
            </div>
        </div>
    </div>
@endsection
