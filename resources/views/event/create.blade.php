@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
@endsection
@section('title', env('APP_NAME') . ' | Registar-Evento')
@section('content')
    <h1 class="h3 text-gray-800 ml-1 mb-3 ">Registar evento</h1>
    {{-- <div class="card my-5"> --}}
    {{-- <div class="card"> --}}
    <!-- Nested Row within Card Body -->
    {{-- <div class="row align-self-center"> --}}
    {{-- <div class="col-lg-12"> --}}
    {{-- /  <div class="p-5"> --}}
    <form action="{{ route('events.store') }}" method="POST" id="event-form" enctype="multipart/form-data">
        @csrf
        @include('event.form')
        
        <button type="submit" class="btn btn-primary float-right ">
            Registar
        </button>
    
    </form>

    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    {{-- </div> --}}
    {{-- </div> --}}

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('focusout change', '.event-fields', function(event) {
                event.preventDefault();
                console.log('hey there');
                autosave();
            });

            function autosave() {
                $.ajax({
                    url: '{{ route('events.store') }}',
                    method: 'POST',
                    data: $('#event-form').serialize(),
                    success: function(response) {
                        console.log('success');
                    },
                });
                console.log('cganfe');
            }
        });
    </script>
    <script>
        const upload = new Upload({ apiKey: "free" });
  
        $(() => {
          $("#file-input").on("change",
            upload.createFileInputHandler({
              onBegin: () => {
                $("#file-input").hide()
              },
              onProgress: ({ progress }) => {
                $("#title").html(`File uploading... ${progress}%`)
              },
              onError: (error) => {
                $("#title").html(`Error:<br/><br/>${error.message}`)
              },
              onUploaded: ({ fileUrl, fileId }) => {
                $("#title").html(`
                  File uploaded:
                  <br/>
                  <br/>
                  <a href="${fileUrl}" target="_blank">${fileUrl}</a>`
                )
              }
            })
          )
        })
      </script>
@endsection
