
@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>





<hr/>
<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<div style='padding: 50px;'>
   
    <div>
        <div class="alert  @if(isset($class)) {!! $class !!} @else alert-danger @endif" role="alert">
            <h4 class="@if(isset($class)) {!! $class !!} @else alert-danger @endif">{!! $title !!}</h4>
            <p> <i><b>{!! $message !!}</b></i></p>
            <hr>
            <p class="mb-0">{!! $footer !!}</p>
        </div>
    </div> 

    @if(isset($returnPage))
        <div class="text-center">
            <a href="{{ route($returnPage) }}" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true" title="Regresar"><i class="fa fa-undo"></i> Regresar</a>
        </div>
    @endif

   

</div>
</section>

@endsection