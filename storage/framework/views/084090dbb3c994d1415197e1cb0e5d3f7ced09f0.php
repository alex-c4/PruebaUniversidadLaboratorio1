<?php $__env->startSection('content'); ?>

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
                    
                      <p><ok>Quiniela:</ok> Publica Rusia 2018</p>                
                    
                  </div>
        				
                  <div class="cont3 col-lg-6">
                    
                      <p><ok>Tu Pronostico ID:</ok> 01 </p>                
                    
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
        		    <form id="register-form" class="form" method="POST" action="<?php echo e(route('payment')); ?>">
              

                   <?php echo e(csrf_field()); ?>

                   
                   <input type="hidden" id="id_bet" name="id_bet" value="<?php echo e($id_bet); ?>">
                  
                   <!--
                    <input type="hidden" id="id_bet" name="id_bet" value="1">
        		         -->
                    <legend>Registro de pago</legend>
        		    
        		        <div class="body">
                      <!-- Forma de pago -->
                      
                      <label>Forma de pago</label>
                      <br>

                       <select class="input-huge <?php echo e($errors->has('fomaPago') ? 'border-danger' : ''); ?>" id="fomaPago" name="fomaPago">
                      
                      
                           <option value="PAYPAL">PAYPAL</option>
                                   
                      </select>
                      <br>
                      <br>
                      <!--
                      <input type="text" class="form-control <?php echo e($errors->has('emailContact') ? 'border-danger' : ''); ?>" name="emailContact" id="emailContact" placeholder="Mail" value="<?php echo e(old('emailContact')); ?>">
                      -->
        		        	<!-- Usuario PayPal -->
                     <!-- 
    		        		<label for="name">Usuario PayPal</label>
    		        		<input name="name" class="input-huge" type="text" id="userPaypal">
                    -->

        		        	<!-- Referencia de pago -->
    		        		<label for="ref_pago">Codigo de Referencia de pago</label>
    		        		<input name="ref_pago" class="input-huge" type="text" id="ref_pago" >
        		        	
                    <!-- Monto pago --> 
                     <input type="hidden" id="amount" name="amount" value="10.0">

                      <!-- Fecha de pago -->                      
        		        	<label>Fecha de pago</label>
        		        	<!--<input class="input-huge" type="text">-->
        		        	<div class="date dp-date">
                  <input type="text" class="form-control <?php echo e($errors->has('payment_date') ? 'border-danger' : ''); ?>" name="payment_date" id="payment_date" value="<?php echo e(old('payment_date')); ?>" placeholder="Fecha del pago" >
                  <?php echo $errors->first('payment_date', '<span class="text-danger">:message</span>'); ?>

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
        	</div>

        </div>
    </div>
<br>
 

	
</body></html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>