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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="text-light text-center mb-5">TODO APP</h1>
                <div class="card border-0"
                    style="/* From https://css.glass */
                    background: rgba(255, 255, 255, 0.2);
                    border-radius: 16px;
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    backdrop-filter: blur(5px);
                    -webkit-backdrop-filter: blur(5px);
                    border: 1px solid rgba(255, 255, 255, 0.3);">
                    <div class="card-body">
                        <h2 class="text-header text-light">Login</h2>
                        @if (session('notAllowed'))
                            <div class="alert my-3 alert-danger">
                                Anda belum Login
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                Berhasil Register, Silahkan Login
                            </div>
                            <script>
                                Swal.fire(
                                    'Berhasil',
                                    'Akun kamu berhasil didaftarkan',
                                    'success'
                                )
                            </script>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                Username atau Password salah
                            </div>
                            <script>
                                Swal.fire(
                                    'Login Gagal',
                                    'Username atau Password salah',
                                    'error'
                                )
                            </script>
                        @endif
                        <form action="/login" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3" role="alert">
                                    @foreach ($errors->all() as $error)
                                        - {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label text-light">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-light">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-flex flex-column align-items-start">
                                <button type="submit" class="btn btn-secondary text-light">Submit</button>
                                <span class="text-dark mt-2"><a class="text-decoration-none" href="/register">Belum punya
                                        akun?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
