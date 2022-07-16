<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title', 'Tikonta') </title>

    <link rel="icon" href="{{ asset('/book-solid.svg') }}" type="image/svg">

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
                              {{date('D',strtotime($event->start_date))}}, {{date('d/m/Y', strtotime($event->start_date)) }} - {{date('D',strtotime($event->end_date))}}, {{ date('d/m/Y', strtotime($event->end_date)) }}</i>
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
                            <p class="card-text">{!! $event->description !!}</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>

                    {{-- Location area --}}
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <h5>Local</h5>
                        </div>
                        <div class="card-body">
                            {{-- <h5 class="card-title">{{ $event->title }}</h5> --}}
                            <p class="text-muted">{{ $event->address }}, {{ $event->city }}</p>
                            <a href="#" class="btn btn-success">Ver no mapa</a>
                        </div>
                    </div>

                </div>

                <div class="col  col-md-2 col-lg-2 col-xl-2 d-none d-md-none">
                    Two
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    @yield('scripts')


    <script>
        $(document).ready(function() {

            $('.preloader').fadeOut('hide');
            $('.data-table').dataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registos",
                    "zeroRecords": "Nenhum resultado encontrado!",
                    "info": "Mostrando registos de _START_ a _END_ de um total de _TOTAL_ registos",
                    "infoEmpty": "Mostrando registos de 0 a 0 de um total de 0 registos",
                    "infoFiltered": "(filtrado de um total de _MAX_ registos)",
                    "sSearch": "Pesquisar:",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sLast": "último",
                        "sNext": "Próximo",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing": "Processando...",
                },
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
            // $('.select2').select2();
            EditorJS({
                /**
                 * Id of Element that should contain Editor instance
                 */
                holder: 'description'
            });
        });

        // $(function() {
        //     // $('.select2').each(function() {
        //     //     $(this).select2({
        //     //         theme: 'bootstrap4'
        //     //         , width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        //     //         , placeholder: $(this).data('placeholder')
        //     //         , allowClear: Boolean($(this).data('allow-clear'))
        //     //     , });
        //     // });
        // });

        $(document).load(function() {
            $('.preloader').fadeOut('slow');
        });
    </script>


</body>

</html>
