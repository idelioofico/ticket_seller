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

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('css/select2.min.css') }}"></script> --}}
    {{-- <script src="{{ asset('css/select2-bootstrap4.min.css') }}"></script> --}}
    <link href="{{ asset('/css/loader.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/pulse.css') }}">





    <!-- Styles -->
    @yield('css')

</head>

<body id="page-top">
    <div class="preloader"></div>
    @include('layouts.header')


    @include('layouts.sidebar')

    <div class="container-fluid">

        @include('notification.alert')

        @yield('content')

    </div>


    @include('sweetalert::alert')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    {{-- <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="{{ asset('js/select2.min.js') }}"></script> --}}
    <script src="{{ asset('/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/js/geral.js') }}"></script>
    {{-- <script src="{{ asset('/js/dropzone.js') }}"></script> --}}
    <script src="https://js.upload.io/upload-js/v1"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>


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