@extends('layouts.app')

@section('title', env('APP_NAME') . ' | Produtos-Lista')
@section('css')

@endsection
@section('content')

<div class="container">
    <h1 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary ">Eventos</h1>

    <hr>
    {{-- <div class="card shadow mb-4 border-bottom-primary">
        <div class="card-header py-3"> --}}
    {{-- <div class="row mb-4">
        <h6 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary">Meus eventos</h6>
    </div> --}}
    {{-- </div> --}}
    {{-- <div class="card-body"> --}}
    @if (count($events) > 0)

        <div class="row">

            @foreach ($events as $chave => $item)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $item->title }}</h5>
                            <p>
                                <small class="card-text">
                                    @if (strlen($item->description) < 200)
                                        {{ $item->description }}
                                    @else
                                        {{ substr_replace($item->description, '...', 200) }}
                                    @endif
                                </small>
                            </p>
                            <a href="{{ route('events.show', $item->id) }}}" class="btn btn-primary">Ver evento</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {!! $events->links() !!} --}}
    @else
        <div class="alert alert-info">Nenhum registo para mostrar.</div>
    @endif
</div>