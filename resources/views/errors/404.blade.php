@extends('app')

@section('content')
    <div class="container-fluid">
        <div id="layoutError_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mt-4">
                                <img class="img-fluid p-4" src="{{asset('/assets/img/freepik/404-error-pana.svg')}}" alt />
                                <p class="lead">Página não encontrada!</p>
                                {{-- <a class="text-arrow-icon" href="index-2.html">
                                    <i class="ml-0 mr-1" data-feather="arrow-left"></i>
                                    Return to Dashboard
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
