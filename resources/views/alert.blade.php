
@extends('layoutMenu')

@section('content')


<hr/>
<section id="contact" class="section-bg wow fadeInUp" >
<div style='padding: 50px;'>
   
    <div>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-dager">{!! $title !!}</h4>
            <p> <i><b>{!! $message !!}</b></i></p>
            <hr>
            <p class="mb-0">{!! $footer !!}</p>
        </div>
    </div> 


</div>
</section>

@endsection