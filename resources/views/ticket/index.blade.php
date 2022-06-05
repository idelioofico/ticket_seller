@extends('layouts.app_event')

@section('title', env('APP_NAME') . ' | Produtos-Lista')
@section('css')

@endsection
@section('content')


    <h1 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary ">Meus tickets</h1>

    <div class="row mb-4">
        <div class="col d-flex flex-row-reverse bd-highlight">
            @can('registar-evento')
                <a class="btn btn-primary btn-user text-white" href="{{ route('events.tickets.create',$event->id) }}">
                    <i class="fas fa-plus"></i>
                    Novo Ticket
                </a>
            @endcan
        </div>
    </div>
    {{-- <hr> --}}
    {{-- <div class="card shadow mb-4 border-bottom-primary">
        <div class="card-header py-3"> --}}
    {{-- <div class="row mb-4">
        <h6 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary">Meus eventos</h6>
    </div> --}}
    {{-- </div> --}}
    {{-- <div class="card-body"> --}}
   

    <div class="card shadow mb-4 border-bottom-primary">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary">Listagem</h6>
            </div>
        </div>
        <div class="card-body">
            @if (count($tickets) > 0)
                <div class="table-responsive">
                    <table class="table table-borderdless data-table table-hover table-striped" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th  style="text-align: center;">#</th>
                                <th style="text-align: center;">Título</th>
                                <th  style="text-align: center;">Estado</th>
                                <th style="text-align: center;">Preço</th>
                                {{-- <th style="text-align: center;">Data</th> --}}
                                {{-- <th style="text-align: center;">Local</th> --}}
                                <th style="text-align: center;">Vendas</th>
                                {{-- <th style="text-align: center;"></th> --}}
                                {{-- <th style="text-align: center;">Vendas</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $key => $item)
                                @php
                                    $badge = 'badge-primary';
                                    $status = '';
                                    $percentage=0;
                                    $sold_tickets=$item->orders()->count();
                                    if (strtotime($item->start_date) > strtotime(date('Y-m-d')) &&  strtotime($item->end_date) > strtotime(date('Y-m-d'))) {
                                        $badge = 'badge-success';
                                        $message = 'Aberto';
                                    } elseif (strtotime($item->start_date) <= strtotime(date('Y-m-d')) && strtotime($item->end_date) >= strtotime(date('Y-m-d')) ) {
                                        $badge = 'badge-warning pulse';
                                        $message = 'A decorrer';
                                    } else {
                                        $badge = 'badge-danger';
                                        $message = 'Terminou';
                                    }
                                    $percentage=($sold_tickets*100)/($item->qnt);
                                @endphp
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td style="text-align: center;">{{ $item->title }}</td>
                                    <td class="text-center"><span
                                            class="badge badge-pill {{ $badge }}">{{ $message ?? '----------' }}</span>
                                   {{date('D, d/m/y',strtotime($item->start_date))}} - {{date('D, d/m/y',strtotime($item->end_date))}}</td>
                                    <td style="text-align: center;">{{ number_format($item->price,'2','.',',') }}</td>
                                    <td style="text-align: center;">{{$sold_tickets}}/{{$item->qnt}} | P: {{$percentage}}%</td>
                                    <td style="text-align: center;">{{ $item->address }}</td>
                                    {{-- <td class="text-right">{{ 0 }}</td> --}}

                                    {{-- @if (!Gate::denies('editar-itemo') || !Gate::denies('apagar-itemo')) --}}
                                    <td class="text-center accao">
                                        <div class="btn-group">
                                            {{-- @can('editar-item') --}}
                                            <a href="{{ route('events.tickets.edit',[$event->id,$item->id]) }}"
                                                class="btn btn-primary btn-sm " title="Ver detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- <a href="{{ route('events.edit', $event->id) }}"
                                                        class="btn  btn-warning btn-sm ">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                            {{-- @endcan --}}
                                            {{-- @can('apagar-produto')
                                                    <button value="{{ $produto->id }}"
                                                        class="btn btn-danger btn-sm delete-produto">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                @endcan --}}
                                        </div>
                                    </td>
                                    {{-- @endif --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- {!! $produtos->links() !!} --}}
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

            $(".delete-evento").click(function(event) {
                event.preventDefault();
                var ele = $(this);


                // if (confirm('Deseja apagar produto?')) {
                //     $.ajax({
                //         url: '{{ url('/produtos/delete') }}/' + ele.attr("value")
                //         , method: 'POST'
                //         , data: {
                //             _token: '{{ csrf_token() }}'
                //         }
                //         , dataType: 'JSON'
                //         , success: function(response) {
                //             if (response.success) {
                //                 window.location.reload();
                //             }
                //         }
                //     });
                // }

            });

            $("#imprimir-produto").click(function(event) {
                var data = $('.table').not(".accao").html();
                console.log(data);

                $.post('{{ '/imprimir' }}', {
                    'data': data,
                    '_token': '{{ csrf_token() }}'
                }, function(response) {
                    console.log("jobe done");
                });

            });

        });
    </script>

@endsection
