@extends('layouts.app')

@section('title', env('APP_NAME') . ' | Plataforma de eventos')
@section('css')

@endsection
@section('content')

    {{-- <div class="container-fluid"> --}}
    <div style="margin-top: 100px"></div>
    <h3 class="ml-2 mr-0 mb-0 mu-0 font-weight-bold text-primary mt-4">Eventos</h3>
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
                <div class="col-sm-12 col-lg-4 mb-4">
                    <div class="card" style="width: 90vw;">
                        <img src="{{ public_path($item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold mb-0">{{ $item->title }}</h5>
                            <p class="card-text mb-2 ml-2">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 9.92004C4 7.79831 4.84285 5.76348 6.34315 4.26319C7.84344 2.7629 9.87827 1.92004 12 1.92004C14.1217 1.92004 16.1566 2.7629 17.6569 4.26319C19.1571 5.76348 20 7.79831 20 9.92004C20 15.4 13 21.5 12.65 21.76C12.4689 21.915 12.2384 22.0001 12 22.0001C11.7616 22.0001 11.5311 21.915 11.35 21.76C11.05 21.5 4 15.4 4 9.92004ZM12 19.65C10.32 18.06 6 13.65 6 9.92004C6 8.32874 6.63214 6.80262 7.75736 5.6774C8.88258 4.55219 10.4087 3.92004 12 3.92004C13.5913 3.92004 15.1174 4.55219 16.2426 5.6774C17.3679 6.80262 18 8.32874 18 9.92004C18 13.61 13.68 18.06 12 19.65ZM8.5 9.50004C8.5 8.80781 8.70527 8.13112 9.08986 7.55555C9.47444 6.97998 10.0211 6.53137 10.6606 6.26647C11.3001 6.00156 12.0039 5.93225 12.6828 6.0673C13.3617 6.20234 13.9854 6.53569 14.4749 7.02517C14.9644 7.51465 15.2977 8.13829 15.4327 8.81723C15.5678 9.49616 15.4985 10.1999 15.2336 10.8394C14.9687 11.479 14.5201 12.0256 13.9445 12.4102C13.3689 12.7948 12.6922 13 12 13C11.0717 13 10.1815 12.6313 9.52513 11.9749C8.86875 11.3185 8.5 10.4283 8.5 9.50004ZM10.5 9.50004C10.5 9.79672 10.588 10.0867 10.7528 10.3334C10.9176 10.5801 11.1519 10.7723 11.426 10.8859C11.7001 10.9994 12.0017 11.0291 12.2926 10.9712C12.5836 10.9133 12.8509 10.7705 13.0607 10.5607C13.2704 10.3509 13.4133 10.0837 13.4712 9.79268C13.5291 9.50171 13.4994 9.20011 13.3858 8.92602C13.2723 8.65193 13.08 8.41766 12.8334 8.25284C12.5867 8.08802 12.2967 8.00004 12 8.00004C11.6022 8.00004 11.2206 8.15808 10.9393 8.43938C10.658 8.72069 10.5 9.10222 10.5 9.50004Z">
                                    </path>
                                </svg>
                                <small class="text-muted">{{ $item->address }}, {{ $item->city }}</small>
                            </p>
                            <p class="card-text mb-3 ml-3">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 16C7 15.8022 7.05865 15.6089 7.16853 15.4444C7.27841 15.28 7.43459 15.1518 7.61732 15.0761C7.80004 15.0004 8.00111 14.9806 8.19509 15.0192C8.38907 15.0578 8.56725 15.153 8.70711 15.2929C8.84696 15.4327 8.9422 15.6109 8.98079 15.8049C9.01937 15.9989 8.99957 16.2 8.92388 16.3827C8.84819 16.5654 8.72002 16.7216 8.55557 16.8315C8.39112 16.9414 8.19778 17 8 17C7.73478 17 7.48043 16.8946 7.29289 16.7071C7.10536 16.5196 7 16.2652 7 16ZM12 15H16C16.2652 15 16.5196 15.1054 16.7071 15.2929C16.8946 15.4804 17 15.7348 17 16C17 16.2652 16.8946 16.5196 16.7071 16.7071C16.5196 16.8946 16.2652 17 16 17H12C11.7348 17 11.4804 16.8946 11.2929 16.7071C11.1054 16.5196 11 16.2652 11 16C11 15.7348 11.1054 15.4804 11.2929 15.2929C11.4804 15.1054 11.7348 15 12 15ZM18 20H6C5.73478 20 5.48043 19.8946 5.29289 19.7071C5.10536 19.5196 5 19.2652 5 19V13H19V19C19 19.2652 18.8946 19.5196 18.7071 19.7071C18.5196 19.8946 18.2652 20 18 20ZM6 6H7V7C7 7.26522 7.10536 7.51957 7.29289 7.70711C7.48043 7.89464 7.73478 8 8 8C8.26522 8 8.51957 7.89464 8.70711 7.70711C8.89464 7.51957 9 7.26522 9 7V6H15V7C15 7.26522 15.1054 7.51957 15.2929 7.70711C15.4804 7.89464 15.7348 8 16 8C16.2652 8 16.5196 7.89464 16.7071 7.70711C16.8946 7.51957 17 7.26522 17 7V6H18C18.2652 6 18.5196 6.10536 18.7071 6.29289C18.8946 6.48043 19 6.73478 19 7V11H5V7C5 6.73478 5.10536 6.48043 5.29289 6.29289C5.48043 6.10536 5.73478 6 6 6ZM18 4H17V3C17 2.73478 16.8946 2.48043 16.7071 2.29289C16.5196 2.10536 16.2652 2 16 2C15.7348 2 15.4804 2.10536 15.2929 2.29289C15.1054 2.48043 15 2.73478 15 3V4H9V3C9 2.73478 8.89464 2.48043 8.70711 2.29289C8.51957 2.10536 8.26522 2 8 2C7.73478 2 7.48043 2.10536 7.29289 2.29289C7.10536 2.48043 7 2.73478 7 3V4H6C5.20435 4 4.44129 4.31607 3.87868 4.87868C3.31607 5.44129 3 6.20435 3 7L3 19C3 19.7956 3.31607 20.5587 3.87868 21.1213C4.44129 21.6839 5.20435 22 6 22H18C18.7956 22 19.5587 21.6839 20.1213 21.1213C20.6839 20.5587 21 19.7956 21 19V7C21 6.20435 20.6839 5.44129 20.1213 4.87868C19.5587 4.31607 18.7956 4 18 4Z">
                                    </path>
                                </svg>
                                <small>
                                    {{ date('D, d/m/Y', strtotime($item->start_date)) }} -
                                    {{ date('D, d/m/Y', strtotime($item->end_date)) }}</i>
                                </small>
                            </p>
                            {{-- <p>
                                <small class="card-text">
                                    @if (strlen($item->description) < 200)
                                        {{ htmlspecialchars($item->description) }}
                                    @else
                                        {{ substr_replace(htmlspecialchars($item->description), '...', 120) }}
                                    @endif
                                </small>
                            </p> --}}
                            <a href="{{ route('events.view', $item->slug) }}" class="btn btn-primary">Ver evento</a>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-sm-12 col-lg-4 mb-4">
                    <div class="card">

                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ $item->title }}</h5>
                            <p class="card-text mb-2">
                                <i class="fa fa-phone"></i>
                                <small class="text-muted">{{ $item->address }}, {{ $item->city }}</small>
                            </p>
                            <p class="card-text">
                                @if (strlen($item->description) < 200)
                                    {{ $item->description }}
                                @else
                                    {{ substr_replace($item->description, '...', 200) }}
                                @endif
                            </p>
                            <p class="card-text">
                                <i class="fa fa-location"></i>
                                <small class="text-info">{{ date('d/m/Y', strtotime($item->start_date)) }}</small>
                            </p>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
        {{-- {!! $events->links() !!} --}}
    @else
        <main>
            <div class="container">
                <div class="my-5">
                    {{-- <h1 class="h3">Olá, <strong>{{ auth()->user()->name }}</strong>!</h1> --}}
                </div>
                <div class="row justify-content-center">

                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <img class="img-fluid p-4" src="{{ asset('/assets/img/freepik/statistics-pana.svg') }}"
                                alt />
                            <p class="lead">Nenhum evento disponével do momento</p>
                            {{-- <a class="text-arrow-icon" href="{{route('manual')}}">
                            <i class="ml-0 mr-1" data-feather="arrow-left"></i>
                            Manual
                        </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
    </div>
@endsection
