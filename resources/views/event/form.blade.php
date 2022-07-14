<div class="card mb-4">

    <div class="card-header">
        Sobre o evento
    </div>

    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 mb-12 mb-sm-0">
                <label for="name">Título</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror " id="title" name="title"
                    value="{{ old('title') ?? $event->title }}">
                @error('title')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="event_type_id">Tipo de evento</label>
                <select name="event_type_id" id="event_type_id" class="form-control custom-select event-fields select2">
                    <option value="">Selecione...</option>
                    @foreach ($event_types as $item)
                        <option @if ($item->id == old('event_type_id') || $item->id == $event->event_type_id) {{ 'selected' }} @endif
                            value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('event_type_id')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="topic_id">Assunto</label>
                <select name="topic_id" id="topic_id" class="form-control custom-select event-fields select2">
                    <option value="">Selecione...</option>
                    @foreach ($event_topics as $item)
                        <option @if ($item->id == old('topic_id') || $item->id == $event->topic_id) {{ 'selected' }} @endif
                            value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('topic_id')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        {{-- </div> --}}
        {{-- </div> --}}
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        Descreva o evento
    </div>
    <div class="card-body">
        <div class=" row">
            <div class="col-sm-12 mb-12 mb-sm-0">
                {{-- <label for="description">Descrição</label> --}}
                <textarea class="form-control @error('description') is-invalid @enderror event-fields richtext" id="description" rows="4"
                    name="description">{{ old('description') ?? $event->description }}</textarea>
                @error('description')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Carregar imagem</div>
    <div class="card-body">
        <div class="col col-6">
            @if (!empty($event->image))
                <div class="form-group row">
                    <div class="col-sm-6 mb-6 mb-sm-0">
                        <img src="/{{ $event->image }}" alt="" width="200" height="100">
                    </div>
                    <div class="col-sm-6 mb-6 mb-sm-0 text-left">
                        <p class="text-warning">Carregue uma nova imagem para actualizar!</p>
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <div class="col-sm-12 mb-12 mb-sm-0">
                    {{-- <label for="image">Carregar imagem do evento</label> --}}
                    <input type="file" class="form-control  @error('image') is-invalid @enderror event-fields"
                        id="image" name="image" value="{{ old('image') ?? $event->image }}">
                    @error('image')
                        <div class="" role="alert">
                            <span class="text-danger ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card mb-4">
    <div class="card-header">
        Duração do evento
    </div>
    <div class="card-body">

        <div class="form-group row">
        
            <div class="col col-sm-12 col-md-6">
                <label for="start_date">Data de Início</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror event-fields" rows="5"
                    name="start_date" id="start_date" value="{{ old('start_date') ?? $event->start_date }}">
                @error('start_date')
                    <div role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            
            <div class="col col-sm-12 col-md-6">
                <label for="start_time">Hora de Início</label>
                <input type="text" class="form-control @error('start_time') is-invalid @enderror event-fields" rows="5"
                    name="start_time" id="start_time" value="{{ old('start_time') ?? $event->start_time }}">
                @error('start_date')
                    <div role="alert">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="col col-sm-12 col-md-6">
                <label for="end_date">Data de Termino</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror event-fields"
                    rows="5" cols="1" name="end_date" id="end_date"
                    value="{{ old('end_date') ?? $event->end_date }}">
                @error('end_date')
                    <div role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="col col-sm-12 col-md-6">
                <label for="end_time">Hora de Termino</label>
                <input type="text" class="form-control @error('end_time') is-invalid @enderror event-fields"
                    rows="5" cols="1" name="end_time" id="end_time"
                    value="{{ old('end_time') ?? $event->end_time }}">
                @error('end_time')
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
        Onde vai decorrer o evento?
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="province_id">Provincia</label>
                <select name="province_id" id="province_id" class="form-control custom-select event-fields select2">
                    <option value="">Selecione...</option>
                    @foreach ($provinces as $item)
                        <option @if ($item->id == old('province_id') || $item->id == $event->province_id) {{ 'selected' }} @endif
                            value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('province_id')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="city">Cidade</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror event-fields" id="city"
                    name="city" value="{{ old('city') ?? $event->city }}">
                @error('city')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <label for="address">Local</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror event-fields" id="address"
                    name="address" value="{{ old('address') ?? $event->address }}">
                @error('address')
                    <div class="" role="alert">
                        <span class="text-danger ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

    </div>

</div>
