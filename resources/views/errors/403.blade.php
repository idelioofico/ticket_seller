@extends('app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

         <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="img-fluid p-4" src="{{asset('/assets/img/freepik/403-error-forbidden-pana.svg')}}" alt />
                                    <p class="lead">Sem permissão para aceder a esta página!</p>
                                    {{-- <a class="text-arrow-icon" href="{{route('home')}}">
                                        <i class="ml-0 mr-1" data-feather="arrow-left"></i>
                                        Voltar para Resumo
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <!-- /.container-fluid -->
                
@endsection