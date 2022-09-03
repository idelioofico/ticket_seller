<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title', env('APP_NAME') . ' | ' . "$event->title") </title>

    {{-- <link rel="icon" href="{{ asset('/book-solid.svg') }}" type="image/svg"> --}}

    <!-- Fonts -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Montserat:200,600" rel="stylesheet"> --}}


    <link href="{{ asset('/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <script src="{{ asset('css/select2.min.css') }}"></script> 
    <script src="{{ asset('css/select2-bootstrap4.min.css') }}"></script>
    <link href="{{ asset('/css/loader.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/pulse.css') }}"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        icon-shape {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            vertical-align: middle;
        }

        .icon-sm {
            width: 2rem;
            height: 2rem;

        }
    </style>


    <!-- Styles -->
    @yield('css')

</head>

<body id="page-top">
    <div class="preloader"></div>
    @include('layouts.partials.header')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        {{-- <div id="content"> --}}

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white fixed-top topbar mb-4 static-top shadow">
            <div class="dropdown d-none d-sm-none d-md-block">
                <a href="#"
                    class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none ">
                    <img width="40" src="{{ asset('assets/brand/bootstrap-logo.svg') }}" alt="">
                </a>
            </div>
            <!-- Topbar Search -->
            <form class=" d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 w-100 me-3 navbar-search">
                <div class="input-group">
                    <input type="search" class="form-control bg-light border-0 small"
                        placeholder="Pesquisar por shows, festivais..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

        </nav>
        <!-- End of Topbar -->

        <div class="container">

            @include('notification.alert')

            <div style="margin-top: 90px;"></div>
            <div class="row">

                <div class="col col-sm-12 col-md-2 col-lg-2 col-xl-2 d-none d-md-none">
                    One
                </div>

                <div class="col col-sm-12">
                    {{-- Header area --}}
                    <div class="card mb-4" style="width: 100%;">
                        <img src="{{ asset($event->image) }}" class="card-img-top" alt="{{ $event->title }}"
                            loading="eager">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p>
                                {{ date('D', strtotime($event->start_date)) }},
                                {{ date('d/m/Y', strtotime($event->start_date)) }} -
                                {{ date('D', strtotime($event->end_date)) }},
                                {{ date('d/m/Y', strtotime($event->end_date)) }}</i>
                            </p>
                        </div>
                    </div>

                    {{-- Description area
                    <div class="card mb-4" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                        </div>
                    </div> --}}
                    <div class="card mb-4" style="width: 100%;">
                        <div class="card-body">
                            {{-- <h5 class="card-title">{{ $event->title }}</h5> --}}
                            <p style="width: 80%;" class="card-text">{!! $event->description !!}</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>

                    {{-- Location area --}}
                    <div class="card mb-4" style="width: 100%;">
                        <div class="card-header">
                            <h5>Local</h5>
                        </div>
                        <div class="card-body">
                            {{-- <h5 class="card-title">{{ $event->title }}</h5> --}}
                            <p class="text-muted">{{ $event->address }}, {{ $event->city }}</p>
                            <a href="#" class="btn btn-success">Ver no mapa</a>
                        </div>
                    </div>

                    @php
                        $tickets = $event->tickets;
                        
                    @endphp

                    {{-- Location area --}}
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <h5>Bilhetes
                                <span class="badge">0000</span>
                            </h5>
                        </div>
                        <div class="card-body">

                            @if (!empty($tickets) || count($tickets) == 0)
                                {{-- <div class="list-group"> --}}
                                <div class="row">
                                    @foreach ($tickets as $ticket)
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="text-dark">{{ $ticket->title }}</p>
                                                </div>

                                                <div class="input-group w-auto justify-content-end align-items-center">
                                                    <input type="button" value="-"
                                                        class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                                        data-field="quantity">

                                                    <input type="number" step="1" max="10" value="0"
                                                        name="quantity"
                                                        class="quantity-field border-0 text-center w-25">

                                                    <input type="button" value="+"
                                                        class="button-plus border rounded-circle icon-shape icon-sm "
                                                        data-field="quantity">

                                                </div>
                                            </div>
                                        </div>
                                        {{-- <button type="button"
                                            class="list-group-item list-group-item-action">{{ $ticket->title }}</button> --}}
                                    @endforeach
                                </div>
                                {{-- </div> --}}
                            @else
                                <p><strong>Nenhum bilhete disponível</strong></p>
                            @endif

                        </div>
                    </div>

                    {{-- Location area --}}
                    <div class="card mt-4" style="width: 100%;">
                        <div class="card-header">
                            {{-- <h5>Local</h5> --}}
                        </div>
                        <div class="card-body">
                            {{-- <h5 class="card-title">{{ $event->title }}</h5> --}}
                            {{-- <p class="text-muted">{{ $event->address }}, {{ $event->city }}</p>
                            <a href="#" class="btn btn-success">Ver no mapa</a> --}}
                        </div>
                    </div>

                </div>

                <div class="col  col-md-2 col-lg-2 col-xl-2 d-none d-md-none">
                    Two
                </div>
            </div>
        </div>
    </div>



  
  <!-- Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    @include('sweetalert::alert')

    {{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/template.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}

    {{-- <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="{{ asset('js/select2.min.js') }}"></script>
            <script src="{{ asset('/js/dataTables.min.js') }}"></script>
            <script src="{{ asset('/js/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('/js/geral.js') }}"></script>
            <script src="{{ asset('/js/dropzone.js') }}"></script>
            <script src="https://js.upload.io/upload-js/v1"></script>
            <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script> --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>

        $(document).ready(function() {

            $('.preloader').fadeOut('hide');
          
            $('.input-group').on('click', '.button-plus', function(e) {
                incrementValue(e);
            });


            $('.input-group').on('click', '.button-minus', function(e) {
                decrementValue(e);
            });

        });

        function incrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal)) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

            function decrementValue(e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                if (!isNaN(currentVal) && currentVal > 0) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(0);
                }
            }

        $(document).load(function() {
            $('.preloader').fadeOut('slow');
        });
    </script>


</body>

</html>
