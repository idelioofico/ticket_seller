@extends('app')

@section('content')

    <main>
        <div class="container">
            <div class="my-5">
                <h1 class="h3">Olá, <strong>{{ auth()->user()->name }}</strong>!</h1>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="text-center mt-4">
                        <img class="img-fluid p-4" src="{{asset('/assets/img/freepik/statistics-pana.svg')}}" alt />
                        <p class="lead">Bem vindo ao Sistema</p>
                        <a class="text-arrow-icon" href="{{route('manual')}}">
                            <i class="ml-0 mr-1" data-feather="arrow-left"></i>
                            Manual
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
