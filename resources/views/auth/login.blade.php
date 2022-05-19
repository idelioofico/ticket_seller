<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}} - Iniciar sessão</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <script src="{{ asset('css/select2.min.css') }}"></script>
    <script src="{{ asset('css/select2-bootstrap4.min.css') }}"></script>

</head>

<body class="bg-gradient-primary ">


    <div class="container">

        <div class="row justify-content-center my-5">

            <div class="col-sm-12 col-md-6 col-lg-6 align-items-center my-5">

                <!-- Nested Row within Card Body -->

                <div class="card shadow-lg my-5 p-5">
                    <div class="text-center">
                        <h1 class="mb-4">
                            <i class="fas fa-book rotate-n-15"></i>
                            {{-- <img style="width:1.5em;" class="sidebar-brand-icon"
                                src="/favicon.png"> --}}
                            <br>
                            <span class="h3 text-gray-900">{{env('APP_NAME')}}</span>
                        </h1>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="user">
                        @csrf
                        <div class="form-group">
                            <input type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                name="email" aria-describedby="emailHelp" value="{{ old('email') }}"
                                placeholder="Digite o Email..." autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Lembrar-se de mim</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Entrar
                        </button>
                    </form>
                </div>


            </div>

        </div>

    </div>






    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
