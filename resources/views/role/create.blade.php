@extends('app')

@section('title', 'Tikonta | Perfil')

@section('content')
  <h1>Perfil</h1>
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row align-self-center">
        <div class="col-lg-12">
            <div class="p-5">
                <form action="{{route('users.perfil.create')}}" method="POST">
                  
                    @include('perfil.form')
                
               
            <div>
                <button type="submit" class="btn btn-primary float-right">
                    Registar
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

