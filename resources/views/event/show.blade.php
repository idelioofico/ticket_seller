@extends('layouts.app_event')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
@endsection

@section('title', env('APP_NAME') . " | {$event->title}")

@section('scripts')
    <script>
        $(document).ready(function() {


            $('#nav-tab button').on('click', function(event) {
                event.preventDefault()

                // console.log(event);

                var tab_content = $('#nav-tabContent').children('div');

                $.each(tab_content, function(e, el) {
                    if ($(el).hasClass('show') && el === $(this).attr('data-bs-target')) {
                        $(el).addClass('show active')
                        $(this).addClass('active');
                    } else {
                        $(el).removeClass('show active');
                        // $().removeClass('active');
                    }
                });
                console.log(tab_content);

                $($(this).attr('data-bs-target')).tab('show');


            })
            // alert('heloo');
            // const triggerTabList = document.querySelectorAll('#nav-tab button')
            // triggerTabList.forEach(triggerEl => {
            //     const tabTrigger = new bootstrap.Tab(triggerEl)

            //     triggerEl.addEventListener('click', event => {
            //         event.preventDefault()
            //         tabTrigger.show()
            //     })
            // })
        });
    </script>
@endsection
