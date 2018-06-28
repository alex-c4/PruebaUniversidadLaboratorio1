
@extends('layoutMenu')

@section('content')


<hr/>
<section id="contact" class="section-bg wow fadeInUp" >
<div style='padding: 50px;'>
   
   
    <div>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-warning">{!! $title !!}</h4>
            <p> <i><b>{!! $message !!}</b></i></p>
            <hr>
            <p class="mb-0">{!! $footer !!}</p>
        </div>
    </div> 

    @if($showButton == 'true')
    <div id="oscuro">
    	<div id="area-botones" class="container text-center">
    		<a class="btn btn-data-target" href="{{ URL::previous() }}">volver</a>
    	</div>
    </div>	
    @endif


</div>
</section>

@endsection