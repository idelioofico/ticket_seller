@extends('app')
@section('title', env('APP_NAME').' | Registar-Empresa')
@section('content')
<h1 class="h3 text-gray-800 ml-1 mb-3 ">Registar Empresa</h1>
{{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row align-self-center">
        <div class="col-lg-7">
            <div class="p-5">
                <form action="{{route('company.store')}}" method="POST">
                   
                    @include('company.form')
                    <button type="submit" class="btn btn-primary float-right ">
                        Registar
                    </button>
                    @csrf
                </form>

            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {

        $('#codigo').val(gerarCodigo(5));
    });

</script>
@endsection
