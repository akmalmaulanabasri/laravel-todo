@extends('page.layout')

@section('content')

<style>
    input {
        border-radius: 24px;
        background: #e0e0e0;
        box-shadow: inset 20px 20px 60px #bebebe,
            inset -20px -20px 60px #ffffff;
    }
</style>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="text-light text-center mb-5">TODO APP</h1>
                <div class="card border-0" style="/* From https://css.glass */
                background: rgba(255, 255, 255, 0.2);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.3);">
                    <div class="card-body">
                        <h2>Register</h2>
                        <form action="/register" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" id="email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" value="{{ old('username') }}" id="username"
                                    name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" value="{{ old('password') }}" id="password"
                                    name="password">
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <button type="submit" class="btn bg-secondary text-light">Submit</button>
                                <span class="text-primary mt-2"><a class="text-decoration-none" href="/login">Sudah punya
                                        akun?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
