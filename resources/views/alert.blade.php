
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
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-danger">{!! $title !!}</h4>
            <p> <i><b>{!! $message !!}</b></i></p>
            <hr>
            <p class="mb-0">{!! $footer !!}</p>
        </div>
    </div> 


</div>
</section>

@endsection