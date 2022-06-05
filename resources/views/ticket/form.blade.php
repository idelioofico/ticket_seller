<div class="card mb-4">

    <div class="card-header">
        Sobre o tickect
    </div>

    <div class="card-body">

        <div class="form-group row">
            <div class="col-sm-12 mb-12 mb-sm-0">
                <label for="name">Título</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror " id="title" name="title"
                    value="{{ old('title') ?? $ticket->title }}">
                @error('title')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>


        <div class="form-group row">

            <div class="col-sm-12 col-md-4 mb-3 mb-sm-0">
                <label for="qnt">Quantidade disponivel para venda</label>
                <input type="number" name="qnt" id="qnt" class="form-control" value="{{old('qnt')??$ticket->qnt}}">
                @error('qnt')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4 mb-3 mb-sm-0">
                <label for="qnt_by_person">Bilhetes por pessoa</label>
                <input type="number" name="qnt_by_person" id="qnt_by_person" class="form-control" value="{{old('qnt_by_person')??$ticket->qnt_by_person}}">
                @error('qnt_by_person')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4 mb-3 mb-sm-0">
                <label for="price">Preço por unidade</label>
                <input type="number" name="price" id="price" step="0.01" class="form-control" value="{{old('price')??$ticket->price}}">
                @error('price')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>

        </div>
    </div>
</div>


<div class="card mb-4">

    <div class="card-header">
        Periodo de vendas
    </div>

    <div class="card-body">

        <div class="form-group row">

            <div class="col-sm-12 col-md-6 mb-3 mb-sm-0">
                <label for="start_date">Data de Início</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror event-fields" rows="5"
                    name="start_date" id="start_date" value="{{ old('start_date') ?? $ticket->start_date }}">
                @error('start_date')
                    <div role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-sm-12 col-md-6 mb-3 mb-sm-0">
                <label for="end_date">Data de Termino</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror event-fields"
                    rows="5" cols="1" name="end_date" id="end_date"
                    value="{{ old('end_date') ?? $ticket->end_date }}">
                @error('end_date')
                    <div role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>

        </div>
    </div>
</div>


<div class="card mb-4">

    <div class="card-header">
        Descrição
    </div>

    <div class="card-body">
        <div class=" row">
            <div class="col-sm-12 mb-12 mb-sm-0">
                {{-- <label for="description">Descrição</label> --}}
                <textarea class="form-control @error('description') is-invalid @enderror event-fields" id="description" rows="4"
                    name="description">{{ old('description') ?? $ticket->description }}</textarea>
                @error('description')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

    </div>
</div>
