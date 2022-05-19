@extends('app')

@section('title', 'Tikonta | Perfil')

@section('content')
  <h1>Perfil</h1>
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row align-self-center">
        <div class="col-lg-12">
            <div class="p-5">
                <form action="{{route('utilizadores.perfil.update',$perfil->id)}}" method="POST">
                  {{-- @method() --}}

                    @include('perfil.form')
                
               
            <div>
                <button type="submit" class="btn btn-primary float-right">
                    Actulizar
                </button>
            </div>
                 
                      
                    @csrf
                </form>
            {{-- </div> --}}
         </div> 
    </div>
</div>
</div>
@endsection
