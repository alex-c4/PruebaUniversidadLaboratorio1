@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow jackInTheBox" >

    <div class="section-header">

        <h3>Pago de Quiniela</h3>
        <p>Sección para el pago de la quiniela realizada</p>

        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 text-center font-italic text-info">

                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="YEBXMKVBQYVTG">
                        <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>


            </div>

        </div>
    </div>

</section>

@endsection
