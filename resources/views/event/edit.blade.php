@extends('app')
@section("title",  "Tikonta | Produto-Editar")
@section('content')
<h1 class="h3 text-gray-800 ml-1 mb-3 "><span class="text-info font-weight-bold">{{$produto->nome}}</span> | Actualizar</h1>
{{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row align-self-center">
            <div class="col-lg-7">
                <div class="p-5">
                    <form action="{{route('produtos.update',$produto->id)}}" method="POST">
                    @method('PATCH')
                        @csrf
                        @include('produto.form')
                        <button type="submit" class="btn btn-primary float-right ">
                            Actualizar
                        </button>

                    </form>

                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
