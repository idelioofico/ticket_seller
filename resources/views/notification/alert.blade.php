@if($message=Session::get("success"))

{{-- <div class="alert alert-success alert-dismissable fade show">
 <i class="fas fa-thumbs-up"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> --}}
@php
  Alert::toast($message,'success');  
@endphp


@endif

@if($message=Session::get("info"))
{{-- <div class="alert alert-info alert-dismissable fade show">
 <i class="fas fa-info"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> --}}
@php
  Alert::toast($message,'info');  
@endphp

@endif
@if($message=Session::get("warning"))
<div class="alert alert-warning alert-dismissable fade show">
   <i class="fas fa-exclamation-triangle"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{-- @php
  Alert::toast($message,'warning');  
@endphp --}}

@endif
@if($message=Session::get("error"))
{{-- <div class="alert alert-danger alert-dismissable fade show">
    <i class="fas fa-times"></i>
    <strong>{{$message}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> --}}

@php
  Alert::error('',$message);  
@endphp

@endif
