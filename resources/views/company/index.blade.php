@extends('app')

@section('title', env('APP_NAME').' | Empresa')

@section('content')

    <h1 class="h3 mb-3 ml-1 text-gray-800">
        <i class="fas fa-store fa-w"></i>
        Empresas
    </h1>

    <div class="h3 text-gray-800 ml-1 mb-3 ">
        <div class="row mb-2">
            <div class="col d-flex flex-row-reverse bd-highlight">
                <a class="ml-1 btn btn-dark text-white">
                    <i class="fas fa-print"></i>
                    Imprimir
                </a>
                @can('registar-empresa')
                    <a class="btn btn-primary btn-user text-white" href="{{ route('company.create') }}">
                        <i class="fas fa-plus"></i>
                        Nova Empresa</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 border-bottom-primary">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary">Listagem</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table">

            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(function() {
            listar();

            function listar() {

                $.ajax({
                    url: '{{ route("company.listar") }}',
                    method: 'GET',
                    dataType: 'html',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $(".table").html(response);
                    },
                    error: function() {
                        console.log("Something wrong...");
                    }
                });
            }
        });

    </script>
@endsection
