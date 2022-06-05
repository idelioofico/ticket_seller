@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
@endsection
@section('title', env('APP_NAME') . ' | Registar-Evento')
@section('content')
    <h1 class="h3 text-gray-800 ml-1 mb-3 ">Meu evento</h1>
    
    <form action="{{ route('events.update',$event->id) }}" method="POST" id="event-form" enctype="multipart/form-data">
      @method('PATCH')
      @include('event.form')
      
      <button type="submit" class="btn btn-primary float-right mb-5">
        Actualizar
      </button>
      @csrf
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
