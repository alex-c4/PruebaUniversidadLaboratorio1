@extends('layoutMenu')

@section('content')

<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="bootstrap/payment/css/bootstrap.min.css" />
    
    <link href="css/payment/main.css" rel="stylesheet">
    <link href="css/payment/font-style.css" rel="stylesheet">
    <link href="css/payment/register.css" rel="stylesheet">

	<script type="text/javascript" src="js/payment/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/payment/js/bootstrap.min.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	</head>
  <body>
<br>
  <br>
 
  	

    <div class="container">
        <div class="row">

        	<div class="col-lg-6">
        		
        		<div class="register-info-wraper">
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<img src="img/imagepay.png" alt="Marcel Newman" class="img-circle">
							</div><!-- /thumbnail -->
              <br>
							<h2>SERVICIO A PAGAR</h2>
        				</div>
        				<div class="row">
        					<div class="cont3 col-lg-6">
        						
        							<p><ok>Campeonato:</ok> Mundial Rusia 2018</p>     						
        						
        					</div>
                  <div class="cont3 col-lg-6">
                    
                      <p><ok>Quiniela:</ok> Fase Final Rusia 2018</p>                
                    
                  </div>
        				
                  <div class="cont3 col-lg-6">
                    
                      <p><ok>Tu Pronostico ID:</ok> {{ $id_bet }} </p>                
                    
                  </div>

        				</div><!-- /inner row -->
						<hr>
						<div class="cont2">
							
              <a href="javascript:history.back()"><h2>Cancelar</h2></a>
						</div>
						
							<div class="info-user2">
                <!-- /inner row 
								<span aria-hidden="true" class="li_user fs1"></span>
								<span aria-hidden="true" class="li_settings fs1"></span>
								<span aria-hidden="true" class="li_mail fs1"></span>
								<span aria-hidden="true" class="li_key fs1"></span>
								<span aria-hidden="true" class="li_lock fs1"></span>
								<span aria-hidden="true" class="li_pen fs1"></span>
                -->
							</div>

        				
        			</div>
        		</div>

        	</div>

        	<div class="col-sm-6 col-lg-6">
        		<div id="register-wraper">
        		    <form id="register-form" class="form" method="POST" action="{{ route('payment') }}">
              

                   {{ csrf_field() }}
                   
                   <input type="hidden" id="id_bet" name="id_bet" value="{{ $id_bet }}">
                  
                   <!--
                    <input type="hidden" id="id_bet" name="id_bet" value="1">
        		         -->
                    <legend>Registro de pago</legend>
        		    
        		        <div class="body">
                      <!-- Forma de pago -->
                      
                      <label>Forma de pago</label>
                      <br>

                       <select class="input-huge {{ $errors->has('fomaPago') ? 'border-danger' : '' }}" id="fomaPago" name="fomaPago">
                      
                      
                           <option value="PAYPAL">PAYPAL</option>
                                   
                      </select>
                      <br>
                      <br>
                      <!--
                      <input type="text" class="form-control {{ $errors->has('emailContact') ? 'border-danger' : '' }}" name="emailContact" id="emailContact" placeholder="Mail" value="{{ old('emailContact') }}">
                      -->
        		        	<!-- Usuario PayPal -->
                     <!-- 
    		        		<label for="name">Usuario PayPal</label>
    		        		<input name="name" class="input-huge" type="text" id="userPaypal">
                    -->

        		        	<!-- Referencia de pago -->
    		        		<label for="ref_pago">ID de Referencia de pago</label>
    		        		<input type="text" name="ref_pago" class="input-huge  {{ $errors->has('name') ? 'border-danger' : '' }}"  id="ref_pago" value="{{ old('ref_pago') }}">
                    {!! $errors->first('ref_pago', '<span class="text-danger">:message<br></span>') !!}
        		        
                      

                    <!-- Monto pago --> 
                     <input type="hidden" id="amount" name="amount" value="10.0">

                      <!-- Fecha de pago -->                      
        		        	<label>Fecha de pago</label>
        		        	<!--<input class="input-huge" type="text">-->
        		        	<div class="date dp-date">
                  <input type="text" class="form-control {{ $errors->has('payment_date') ? 'border-danger' : '' }}" name="payment_date" id="payment_date" value="{{ old('payment_date') }}" placeholder="Fecha del pago" >
                  {!! $errors->first('payment_date', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
        		        <br>
                    <br>



        		        </div>
        		    
        		         <!-- Terminos y condiciones -->
          <div class="text-center">
         
            <label>Al hacer clic en "Registrar" acepto los <a href="" data-toggle="modal" data-target="#legalModal" class="btn-get-started scrollto">términos de GoldXport y la política de privacidad.</a></label>          
          </div>

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>
        		    </form>
        		</div>

              <div class="modal fade" id="legalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Términos de GoldXport y la políticas de privacidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="font-size: 12px;">
                    <p class="c3"><span class="c5">Acepto y entiendo el pago exigido por <b>XportGold</b> a través de <b>PayPal</b> explicado en su <a href="{{ asset('/files/Instructivo Quinielas XportGold.pdf') }}" target="_blank">reglamento del Juego online</a>  a través de la página Web <a class="c22" href="{{ url('/') }}">www.xportgold.com</a> y bajo ningún concepto será motivo de reintegro, devolución o reclamación. Declino cualquier posibilidad de abrir una disputa ante el vendedor <a class="c22" href="{{ url('/') }}">www.xportgold.com</a> e igualmente que esta operación es efectuada por mí y no por un tercero.</span></p>
                    
                    <p class="c7 c4"><span class="c2"></span></p><p class="c3"><span class="c5">Al celebrar este acuerdo, ratificas que XportGold es marca propiedad de Y3A Tecnology C.A</span></p>
                    
                    <p class="c8"><span class="c5">Copyright &copy; 2018 Y3A Tecnology C.A. Todos los derechos reservados.</span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3 c4"><span class="c2"></span></p><p class="c11 c4"><span class="c14 c10"></span></p>
                    
                  </div>
                  <div class="modal-footer">
                    <button  type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                  </div>
                </div>
              </div>
        	</div>

        </div>
    </div>
<br>
 

	
</body></html>
@endsection