@extends('app')

@section('title', 'Tikonta | Perfil')

@section('content')
  <h1 class="h3 text-gray-800 ml-1 mb-3 ">Perfil</h1>
  <div class="row mb-2">
      <div class="col d-flex flex-row-reverse bd-highlight">
          <a class="ml-1 btn btn-dark text-white">
              <i class="fas fa-print"></i>
              Imprimir
          </a>
          <a class="btn btn-primary btn-user text-white" href="{{route('utilizadores.perfil.create')}}">
              <i class="fas fa-plus"></i>
              Novo Perfil
          </a>

      </div>
  </div>
  <div class="card shadow mb-4 border-bottom-primary">
      <div class="card-header py-3">
          <div class="row">
              <h6 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary">Listagem</h6>
          </div>
      </div>
      <div class="card-body">
          @if(count($perfil)>0)
          <div class="table-responsive">
              <table class="table data-table table-bordered table-hover table-striped " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Nome</th>
                          <th>Permissões</th>
                          <th>Acções</th>
                      </tr>
                  </thead>
                  <tbody>

                          @foreach($perfil as $chave=>$item)
                         
                      <tr>
                          <td>{{++$chave}}</td>
                        <td>  @php $perfil=$item->nome; @endphp
                          @if($perfil=="super")
                          <span class="badge  badge-danger"> {{$perfil}}</span>
                          @elseif($perfil=="admin")
                                <span class="badge  badge-counter badge-success">{{$perfil}}</span>
                          @else
                              {{$perfil}}
                          @endif
                        </td>
                          <td>{{count($item->permissao->toArray())}}</td>

                          <td class="text-center">
                              <div class="btn-group">
                                  <a href="{{route('utilizadores.perfil.show',$item->id)}}" class="btn btn-primary btn-sm ">
                                      <i class="fas fa-eye"></i>
                                  </a>
                                  {{-- <a href="{{route('utilizadores.perfil.edit',$item->id)}}" class="btn  btn-warning btn-sm ">
                                      <i class="fas fa-edit"></i>
                                  </a> --}}
                                  <button value="{{$item->id}}" class="btn btn-danger btn-sm delete-cliente">
                                      <i class="fas fa-times"></i>
                                  </button>
                              </div>
                          </td>
                      </tr>
                      @endforeach

                  </tbody>
              </table>
              {{-- {!!$clientes->links()!!} --}}
          </div>
          @else
          <div class="alert alert-info">Nenhum registo para mostrar.</div>
          @endif
      </div>
  </div>


@endsection
