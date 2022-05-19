@extends('app')
@section('title', env('APP_NAME').' | Registar-Porduto')
@section('content')
<h1 class="h3 text-gray-800 ml-1 mb-3 ">Registar Utilizador</h1>
{{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
<div class="card-body p-0">
   
    <!-- Nested Row within Card Bodyn  -->
    <div class="row align-self-center">
        <div class="col-lg-7">
            <div class="p-5">
                <form action="{{route('users.store')}}" method="POST">
                    @csrf
                    @include('utilizador.form')
                    <button type="submit" class="btn btn-primary float-right ">
                        Registar
                    </button>
                </form>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>

</script>
@endsection
