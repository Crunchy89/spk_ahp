@extends('template.template')
@section('font')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
@endsection
@section('body')
<style>
    * {
        font-family: 'Roboto Condensed', sans-serif;
    }
</style>

<body>
    <div class="container-fluid m-0">
        <div class="row bg-light d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="d-none d-md-block d-lg-block col-md-6 col-lg-4 p-3">
                <img src="{{ asset('assets/login_logo.svg') }}" alt="login" class="w-100">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8 h-100" style="background-color: #757de8">
                <div class="row d-flex justify-content-center align-items-center h-100 w-100">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card shadows">
                            <div class="card-body">
                                <h3>Login</h3>
                                <small>Silahkan login untuk menggunakan aplikasi</small>
                                <hr>
                                <form action="{{ route('ceklogin') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class='form-control @error("username") is-invalid @enderror ' name="username" id="username" placeholder="Masukkan Username" value="{{old('username')}}" />
                                        </div>
                                        @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{old('password')}}" placeholder="Masukkan Password" />
                                        </div>
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group p-1">
                                        <input type="checkbox" id="show">&nbsp;
                                        <small>
                                            <label for="show">Lihat Password</label>
                                        </small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-success">Login</button>
                                        <a href="" class="nav-link">Masuk sebagai tamu</a>
                                    </div>
                                </form>
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
        $(document).ready(function() {
            $('#show').change(function() {
                $('#password').attr('type', `${$(this).prop('checked') ? 'text' : 'password'}`)
            })
        })
    </script>
    @endsection
