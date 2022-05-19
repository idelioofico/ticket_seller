@extends('app')

@section('title', 'Tikonta | Utilizadores')
@section('css')

@endsection
@section('content')


    <h1 class="h3 text-gray-800 ml-1 mb-3 ">Utilizadores</h1>
    <div class="row mb-2">
        <div class="col d-flex flex-row-reverse bd-highlight">
            <a class="ml-1 btn btn-dark text-white">
                <i class="fas fa-print"></i>
                Imprimir
            </a>
            {{-- @can('registar-cliente') --}}
            <a class="btn btn-primary btn-user text-white" href="{{ route('users.create') }}">
                <i class="fas fa-plus"></i>
                Novo utilizador</a>
            {{-- @endcan --}}

        </div>
    </div>
    <div class="card shadow mb-4 border-bottom-primary">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary">Listagem</h6>
            </div>
        </div>
        <div class="card-body">
            @if (count($utilizadores) > 0)
                <div class="table-responsive">
                    <table class="table data-table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                @if (auth()->user()->role->isSuper())
                                    <th>Estabelecimento</th>
                                @endif
                                <th>Perfil</th>

                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($utilizadores as $chave => $utilizador)

                                <tr>
                                    <td>{{ ++$chave }}</td>
                                    <td>{{ $utilizador->name }}</td>
                                    <td>{{ $utilizador->email }}</td>
                                    @if (auth()->user()->role->isSuper())
                                        <td>{{$utilizador->company->name??'---------------'}}</td>
                                    @endif
                                    <td>
                                        @php $perfil=$utilizador->role->name; @endphp
                                        @if ($perfil == 'super')
                                            <span class="badge  badge-danger"> {{ $perfil }}</span>
                                        @elseif($perfil=="admin")
                                            <span class="badge  badge-counter badge-success">{{ $perfil }}</span>
                                        @else
                                            {{ $perfil }}
                                        @endif
                                    </td>


                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('users.show', $utilizador->id) }}"
                                                class="btn btn-primary btn-sm ">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{-- {!! $contas->links() !!} --}}
                </div>
            @else
                <div class="alert alert-info">Nenhum registo para mostrar.</div>
            @endif
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(function() {

            $(".delete-conta").click(function(event) {
                event.preventDefault();
                var ele = $(this);
                if (confirm('Deseja apagar conta?')) {
                    $.ajax({
                        url: '{{ url(' / contas / delete ') }}/' + ele.attr("value"),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            }
                        }
                    });
                }
            });

            $('.pagar-conta').click(function() {
                var cliente = ($(this).attr('value')).split('+');
                var codigo = cliente[0];
                var nome = cliente[1];

                $('#label-pagamento-codigo').text(nome);
                $('#modal-pagar-conta').modal('show');
            });

        });

    </script>

@endsection
