@extends('app')
@section('content')
<div id="layoutError_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mt-4">
                        <img class="img-fluid p-4" src="{{asset('/assets/img/freepik/400-error-bad-request-pana.svg')}}" alt />
                        <p class="lead">Requisião ilegal ou mal formada!</p>
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

@endsection