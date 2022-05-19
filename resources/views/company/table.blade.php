@if (count($companies) > 0)
    <div class="table-responsive">
        <table class="table data-table table-bordered table-hover table-striped" width="100%" cellspacing="0">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Nuit</th>
                <th>Contacto</th>
                <th>Email</th>
                <th>Accões</th>
            </thead>
            <tbody>
                @foreach ($companies as $chave => $item)
                    <tr>
                        <td>{{ ++$chave}}</td>
                        <td>{{ $item->name?:'-------------' }}</td>
                        <td>{{ $item->nuit?:'-------------' }}</td>
                        <td>{{ $item->contact?:'-------------' }}</td>
                        <td>{{ $item->email?:'-------------' }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{route('company.show',$item->id)}}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-info">Nenhum registo para mostrar.</div>
@endif
