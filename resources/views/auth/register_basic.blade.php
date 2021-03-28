@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>


<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
      <div class="container" >

        <div class="section-header">
          <br>
          <h3>Registro</h3>
          <p>Registrate y disfruta el privilegio de ser un usuario XportGold...</p>
        </div>



        <form method="POST" action="{{ route('register') }}" id="form_register_user">

          

          {{ csrf_field() }}

          <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
          <input type="hidden" id="hTimeZone" name="hTimeZone">
          

          <div class="form-row">
           
            <!-- Nombre -->
            <div class="form-group col-md-6" >
              <label for="name">Nombre <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
              {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
            </div>
           
            <!-- Apellido -->
            <div class="form-group col-md-6" >
              <label for="lastname">Apellido <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('lastname') ? 'border-danger' : '' }}" name="lastname" id="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
              {!! $errors->first('lastname', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Email -->
            <div class="form-group col-md-12" >
              <label for="email">Correo electrónico <span style="color: red">*</span></label>
              <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" id="email" placeholder="Correo electrónico" value="{{ old('email') }}">
              {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Clave 1 -->
            <div class="form-group col-md-6">
              <label for="password">Contraseña <span style="color: red">*</span></label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" name="password" id="password" placeholder="Contraseña">
              {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Clave confirm -->
            <div class="form-group col-md-6">
              <label for="password">Confirmar Contraseña</label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" name="password_confirmation" id="password-confirm" placeholder="Contraseña">
              {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>


          <!-- Terminos y condiciones -->
          <div class="text-center">
         
            <label>Al hacer clic en "Registrar" acepto los <a href="" data-toggle="modal" data-target="#legalModal" class="btn-get-started scrollto">términos de GoldXport y la política de privacidad.</a></label>          
          </div>
        </div>

        

        <!-- Boton Aceptar -->
        <div class="text-center">
          <button type="submit" id="btnAceptar" class="btn btnAcceptXG btn-sm">Registrar</button>
        </div>

        </form>

      </div>
      <div class="modal fade" id="legalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header modalHeader_xg">
          <img src="{{ asset('img/logo3_03.png') }}" alt="" srcset="">
            <h5 class="modal-title" id="exampleModalLongTitle"> Términos de GoldXport y la políticas de privacidad</h5>
            <button type="button" class="close iconClose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body modalBody_xg" style="font-size: 12px;">
            <p class="c3"><span class="c5">El usuario tiene el deber de leer el presente acuerdo de licencia de usuario final en su totalidad antes de usar los servicios o productos de XportGold.com</span></p><p class="c7 c4"><span class="c2"></span></p><p class="c3"><span class="c5">Al celebrar este acuerdo, ratificas que XportGold es marca propiedad de Y3A Tecnology C.A</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c18 c23"><a class="c22" href="https://www.google.com/url?q=http://www.xportgold.com&amp;sa=D&amp;ust=1526868455453000">www.xportgold.com</a></span><span class="c18">&nbsp;ofrece juegos de apuestas deportivas tipo XportGames, brinda un espacio para el intercambio de Cromos e informaci&oacute;n deportiva a nivel Mundial de conformidad con los t&eacute;rminos y las condiciones que rigen su participaci&oacute;n en estos tipos de juegos y servicios. </span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3"><span class="c5">Al hacer clic en el bot&oacute;n &quot;Acepto&quot; como parte del proceso de registro en el sitio web y de su uso, aceptas los t&eacute;rminos y condiciones establecidos en el presente Acuerdo, la pol&iacute;tica de privacidad, la pol&iacute;tica de cookies, los t&eacute;rminos y condiciones de los juegos, las reglas de las XportGames, las reglas de las apuestas deportivas, y los t&eacute;rminos y condiciones del procesamiento de las transacciones con dinero real y conversi&oacute;n de divisas</span></p><p class="c4 c12"><span class="c10 c14"></span></p><ol class="c1 lst-kix_list_1-0 start" start="1"><li class="c0"><span class="c5 c10">LICENCIA/PROPIEDAD INTELECTUAL</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 1.1 Y3A Tecnology C.A, con sujeci&oacute;n a los t&eacute;rminos y condiciones del presente Acuerdo, te concede como Usuario el derecho personal, no exclusivo y no transferible de usar el sitio Web </span><span class="c19"><a class="c22" href="https://www.google.com/url?q=http://www.xportgold.com&amp;sa=D&amp;ust=1526868455454000">www.xportgold.com</a></span><span class="c5">&nbsp;en su PC o dispositivo, con el fin de acceder a sus servidores y participar en los juegos con dinero real o ficticio disponibles.</span><span class="c15">&nbsp;</span><span class="c24">As&iacute; como tambi&eacute;n se reserva el derecho de solicitar alg&uacute;n comprobante y/o dato adicional a efectos de corroborar los Datos Personales</span></p><p class="c12 c4"><span class="c14 c10"></span></p><p class="c3"><span class="c5">&bull; 1.2 El Servicio no puede ser utilizado por (a) menores de dieciocho a&ntilde;os, (b) personas menores de edad en la jurisdicci&oacute;n correspondiente y (c) personas que se conecten a los Sitios desde lugares cuya legislaci&oacute;n lo proh&iacute;ba. A Y3A Tecnology C.A le resulta imposible verificar la legalidad del Servicio para cada jurisdicci&oacute;n, por lo tanto, ser&aacute; responsabilidad del Usuario comprobar que el uso del Servicio es legal.</span></p><p class="c12 c4"><span class="c14 c10"></span></p><p class="c3" id="h.gjdgxs"><span class="c5">&bull; 1.3 Y3A Tecnology C.A se reserva el derecho a exigir una prueba de la edad del usuario, en todo momento, al objeto de garantizar que los menores no utilicen el Servicio. Asimismo, se reserva el derecho a suspender o cancelar su cuenta y retirar el derecho a usar el Servicio, temporal o permanentemente, si no se proporciona dicha prueba de edad, o si existe la sospecha por nuestra parte de que se trata de un menor.</span></p><p class="c12 c4"><span class="c14 c10"></span></p><p class="c3"><span class="c5">&bull; 1.4 Y3A Tecnology C.A es el &uacute;nico titular del Software y del c&oacute;digo del Software (Sitio Web), de la estructura y la organizaci&oacute;n, incluyendo el copyright, el secreto comercial, la propiedad intelectual y otros derechos. Seg&uacute;n los l&iacute;mites prescritos por las leyes aplicables, no se podra:</span></p><p class="c12 c4"><span class="c14 c10"></span></p><p class="c3 c16"><span class="c5">a. copiar, distribuir, publicar, utilizar t&eacute;cnicas de ingenier&iacute;a inversa, descompilar, desensamblar, modificar o traducir el Software o intentar acceder al c&oacute;digo fuente para crear trabajos derivados del c&oacute;digo fuente del Software, o;</span></p><p class="c3 c16"><span class="c5">b. vender, asignar, conceder en sublicencia, transferir, distribuir o alquilar el Software;</span></p><p class="c3 c16"><span class="c5">c. poner el Software a disposici&oacute;n de terceros a trav&eacute;s de una red de computadoras o;</span></p><p class="c3 c16"><span class="c5">d. exportar el Software a alg&uacute;n pa&iacute;s (ya sea a trav&eacute;s de medios f&iacute;sicos o electr&oacute;nicos); o e. utilizar el Software de forma prohibida por las leyes o las reglas aplicables (cada uno de los casos anteriores constituye un &quot;Uso no autorizado&quot;).</span></p><p class="c12 c4"><span class="c14 c10"></span></p><p class="c3 c16"><span class="c5">Y3A Tecnology C.A, se reserva todos los derechos impl&iacute;citos, no otorgados expresamente al Usuario por el presente Acuerdo, y mantienen todos los derechos, t&iacute;tulos e intereses del y relacionados con el Software.</span></p><p class="c12 c4"><span class="c14 c10"></span></p><p class="c11"><span class="c5 c10">Aceptas que t&uacute; ser&aacute;s el &uacute;nico responsable de los da&ntilde;os, costos o cargos derivados de o en relaci&oacute;n con cualquier Uso no autorizado. En caso de enterarte de un uso no autorizado por parte de una tercera persona, deber&aacute;s informar inmediatamente a Y3A Tecnology C.A y proporcionarle toda la ayuda necesaria en cualquier tipo de investigaci&oacute;n que Y3A Tecnology C.A lleve a cabo como consecuencia de la informaci&oacute;n proporcionada por ti en este aspecto.</span></p><p class="c3"><span class="c5">&bull; 1.5 Los t&eacute;rminos &quot;XportGold&quot; y &ldquo;SportGold&quot;, los nombres de los dominios &quot;xportgold.com&quot; y otras marcas registradas, marcas de servicio, im&aacute;genes o denominaciones comerciales, o nombres de dominios utilizados por &nbsp;en los Sitios o en el Software, a veces, (las &quot;Marcas registradas&quot;), son las marcas registradas, marcas de servicio, im&aacute;genes, denominaciones comerciales o nombres de dominios de Y3A Tecnology C.A. Asimismo, todo el contenido de los Sitios, incluyendo, entre otros, el Software, las im&aacute;genes, las fotograf&iacute;as, los gr&aacute;ficos, las animaciones, los videos, la m&uacute;sica, el audio y el texto (el &quot;Contenido del Sitio&quot;), pertenece a Y3A Tecnology C.A &nbsp;y est&aacute; protegido por copyright o por otros derechos de propiedad intelectual. Por el presente admites que, mediante el uso del Servicio y los Sitios, no obtienes ning&uacute;n derecho sobre el Contenido del Sitio o las Marcas comerciales, ni sobre ning&uacute;n fragmento de los mismos. No podr&aacute;s utilizar bajo ninguna circunstancia el Contenido del Sitio o las marcas registradas sin el previo consentimiento por escrito de Y3A Tecnology C.A.</span></p><p class="c11 c4"><span class="c14 c10"></span></p><p class="c3"><span class="c5 c10">&bull; 1.6 Garantizas que los nombres o im&aacute;genes usados por ti y relacionados con el Sitio o el Servicio (por ejemplo, tu nombre de usuario) no infringir&aacute;n la propiedad intelectual, privacidad u otros derechos de ninguna tercera parte. Por el presente acuerdo otorgas a Y3A Tecnology C.A. una licencia, internacional, irrevocable, transferible y libre de regal&iacute;as para usar tales nombres e im&aacute;genes para cualquier fin relacionado con el Sitio o el Servicio, sujeto a los t&eacute;rminos y condiciones</span></p><p class="c3 c4"><span class="c5 c10"></span></p><p class="c3 c4"><span class="c5 c10"></span></p><ol class="c1 lst-kix_list_1-0" start="2"><li class="c0"><span class="c5 c10">GARANTIAS</span></li></ol><p class="c7 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 2.1 Y3A Tecnology C.A no asume responsabilidad alguna por garant&iacute;as, expl&iacute;citas o impl&iacute;citas, relacionadas con el Servicio, que se te proporciona &quot;tal cual&quot;, y que se te facilita sin garant&iacute;a y sin responsabilidad alguna con respecto a su calidad, aptitud para el uso, integridad o precisi&oacute;n.</span></p><p class="c4 c11"><span class="c14 c10"></span></p><p class="c3"><span class="c5 c10">&bull; 2.2 Y3A Tecnology C.A no garantiza que el Servicio sea ininterrumpido, puntual o que est&eacute; libre de errores, que puedan corregirse los defectos o que el Software y los Sitios se encuentren libres de virus, fallos u otros errores.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><p class="c3"><span class="c5 c10">&bull; 2.3 Y3A Tecnology C.A&nbsp;se reserva el derecho de suspender, discontinuar, modificar, eliminar o agregar al Servicio, a su absoluta discreci&oacute;n, con efecto inmediato, y sin obligaci&oacute;n de avisarte cuando lo considere necesario para la gesti&oacute;n, mantenimiento o actualizaci&oacute;n del Software y no seremos responsables, de ning&uacute;n modo, por la p&eacute;rdida sufrida como consecuencia de las decisiones tomadas por Y3A Tecnology C.A &nbsp;en este sentido.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><ol class="c1 lst-kix_list_1-0" start="3"><li class="c0"><span class="c5 c10">AUTORIDAD</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 3.1 Y3A Tecnology C.A&nbsp;mantiene su potestad sobre la concesi&oacute;n, el mantenimiento y la cancelaci&oacute;n de las cuentas de sus Usuarios en el Sitio. Las decisiones tomadas en lo concerniente a cualquier aspecto de las cuentas de Usuario, uso del Servicio o resoluci&oacute;n de conflictos, ser&aacute;n finales y no ser&aacute;n susceptibles de revisi&oacute;n ni apelaci&oacute;n.</span></p><p class="c3 c4"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="4"><li class="c0"><span class="c5 c10">COMPROMISOS</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3 c20"><span class="c5 c10">Antes de usar el Servicio y de manera permanente, manifiestas, garantizas, acuerdas y aceptas que:</span></p><p class="c3 c4 c20"><span class="c5 c10"></span></p><p class="c3"><span class="c5">&bull; 4.1 Existe el riesgo de perder dinero al utilizar el Servicio, y Y3A Tecnology C.A&nbsp;no es responsable de tus p&eacute;rdidas.</span></p><p class="c3"><span class="c5">&bull; 4.2 El uso del Servicio es tu opci&oacute;n personal y que lo realizas por tu cuenta y riesgo.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><p class="c3"><span class="c5 c10">&bull; 4.3 En cumplimiento con nuestros requisitos legales y para que puedas acceder y usar nuestro software o nuestros servicios a trav&eacute;s de cualquiera de nuestros sitios web, tendr&aacute;s que proporcionarnos cierta informaci&oacute;n personal acerca de ti (incluyendo detalles de tus m&eacute;todos de pago) y autorizarnos a acceder o a hacer uso de tu informaci&oacute;n de ubicaci&oacute;n o tales datos o informaci&oacute;n que puedan derivarse de tu dispositivo/computadora, para permitir que el servicio/software est&eacute; disponible para que lo uses. Por el presente documento nos autorizas a acceder y a usar dichos datos para los fines especificados anteriormente. No puedes usar nuestro software o servicios si no deseas estar vinculado por esta disposici&oacute;n. Y3A Tecnology C.A&nbsp;procesar&aacute; tu informaci&oacute;n personal cumpliendo los requisitos de las leyes y regulaciones de protecci&oacute;n de datos, tal y como ha acordado y se expone en nuestra Pol&iacute;tica de privacidad.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><p class="c3"><span class="c5">&bull; 4.4 Ser&aacute;s el &uacute;nico responsable de los impuestos aplicables derivados de los pagos en efectivo o premios que se te otorguen a trav&eacute;s del Servicio.</span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 4.5 La conexi&oacute;n a Internet y de las redes de telecomunicaciones necesarias para el acceso y uso del Servicio se encuentran en su totalidad bajo el control de Y3A Tecnology C.A, y Y3A Tecnology C.A no tendr&aacute; responsabilidad alguna por las interrupciones, la lentitud, las limitaciones de capacidad u otras deficiencias que la afectan.</span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 4.6 Tienes 18 a&ntilde;os o m&aacute;s y en la actualidad no est&aacute;s autoexcluido de ning&uacute;n sitio de apuestas online ni m&oacute;viles y que nos informar&aacute;s inmediatamente en caso de firmar un acuerdo de autoexclusi&oacute;n con alg&uacute;n proveedor de servicios de apuestas.</span></p><p class="c3 c4"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="5"><li class="c0"><span class="c5 c10">USOS PROHIBIDOS</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 5.1 MODIFICACIONES DEL SOFTWARE: el Usuario nunca intentar&aacute; modificar, descompilar, desensamblar ni aplicar un proceso de ingenier&iacute;a inversa al Software en ning&uacute;n caso.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 5.2 USO PERSONAL: El Servicio est&aacute; concebido &uacute;nicamente para el uso personal del Usuario. Al Usuario solo se le permite hacer apuestas para su entretenimiento personal. Al Usuario no se le permitir&aacute;, bajo ninguna circunstancia, utilizar su &quot;cuenta de dinero real&quot; de Y3A Tecnology C.A para cualquier otro prop&oacute;sito que no sea el uso del Servicio. El Usuario deber&aacute; facilitar informaci&oacute;n completa y fehaciente sobre todo dato o aspecto particular facilitado a Y3A Tecnology C.A, y estar&aacute; obligado a actualizar dicha informaci&oacute;n siempre que exista alg&uacute;n cambio a la misma.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 5.3 COMPORTAMIENTO FRAUDULENTO: En caso de que Y3A Tecnology C.A &nbsp;considere que un Usuario ha realizado o intentado realizar actividades fraudulentas, ilegales, deshonestas o inadecuadas durante el uso del Servicio, incluyendo sin limitaci&oacute;n las descritas en la presente cl&aacute;usula 5, o cualquier tipo de manipulaci&oacute;n del juego, la realizaci&oacute;n de un pago fraudulento, incluyendo, pero sin limitarse al uso de una tarjeta de cr&eacute;dito robada o el rechazo fraudulento de d&eacute;bito o el lavado de dinero, Y3A Tecnology C.A &nbsp;tendr&aacute; derecho a emprender las acciones que estime oportunas, incluyendo, pero sin limitarse a:</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;bloquear inmediatamente el acceso al Servicio para dicho Usuario;</span></p><p class="c3"><span class="c5">b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cerrar la cuenta de XportGold del Usuario;</span></p><p class="c3"><span class="c5">c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;embargar los fondos de la cuenta de un Usuario;</span></p><p class="c3"><span class="c5">d.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;revelar dicha informaci&oacute;n (incluyendo la identidad del Usuario) a las instituciones financieras, autoridades relevantes y cualquier persona o entidad que tenga derecho legal a dicha informaci&oacute;n; o</span></p><p class="c3"><span class="c5">e.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;emprender acciones legales contra el Usuario.</span></p><p class="c3 c4"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="6"><li class="c0"><span class="c5 c10">POL&Iacute;TICA DE REINTEGROS</span></li></ol><p class="c7 c4"><span class="c2"></span></p><p class="c3"><span class="c5 c10">&bull; 6.1 La pol&iacute;tica y los criterios para que el usuario pueda realizar el reintegro desde su cuenta de usuario se pueden encontrar en nuestra Pol&iacute;tica de reintegros. Y3A Tecnology C.A &nbsp;se reserva el derecho de utilizar criterios adicionales de elegibilidad para determinar las opciones de reintegro que se pueden ofrecer a los usuarios en un determinado momento.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><ol class="c1 lst-kix_list_1-0" start="7"><li class="c0"><span class="c5 c10">CONTENIDO O LENGUAJE OFENSIVO</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5 c10">&bull; 7.1 Se proh&iacute;be al Usuario la publicaci&oacute;n de cualquier tipo de material il&iacute;cito, indecente, racista, obsceno, injurioso, difamatorio, amenazador o de cualquier otra &iacute;ndole que incumpla las leyes en vigor o que pueda considerarse generalmente como ofensivo, ya sea a trav&eacute;s del Servicio, las im&aacute;genes de los jugadores o en mensajes al personal de Y3A Tecnology C.A &nbsp;.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><ol class="c1 lst-kix_list_1-0" start="8"><li class="c0"><span class="c5 c10">INCUMPLIMIENTO</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 8.1 Sin perjuicio de cualquier otro derecho, si un Usuario incumple total o parcialmente lo dispuesto en el presente Acuerdo, Y3A Tecnology C.A &nbsp;se reserva el derecho a adoptar cualquier medida que estime oportuna, incluso la extinci&oacute;n del presente Contrato o cualquier otro contrato con el Usuario, as&iacute; como el bloqueo inmediato del acceso al Servicio para dicho Usuario o de cualquier otro servicio ofrecido por XportGold, el cierre de su cuenta de los Sitios o de cualquier otro sitio web operado por el Y3A Tecnology C.A , la confiscaci&oacute;n del dinero de la cuenta del Usuario de los Sitios o de cualquier otro sitio web operado por Y3A Tecnology C.A, o la adopci&oacute;n de medidas legales en su contra.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 8.2 Aceptas mantener indemne, defender y eximir de toda responsabilidad a Y3A Tecnology C.A, as&iacute; como a sus accionistas, directivos y empleados, de y contra reclamaciones, demandas, obligaciones, da&ntilde;os, p&eacute;rdidas, costos y gastos, incluidos los honorarios legales y cualesquiera otras cargas, con independencia de su origen, que pudieran surgir como consecuencia de:</span></p><p class="c3"><span class="c5">a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;el incumplimiento por tu parte del presente Acuerdo, ya sea total o parcialmente;</span></p><p class="c3"><span class="c5">b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;el incumplimiento por tu parte de cualquier ley o de los derechos de terceros; y</span></p><p class="c3"><span class="c5">c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;el uso del Servicio por tu parte o por cualquier otra persona que acceda a este utilizando tus credenciales de acceso (seg&uacute;n se definen a continuaci&oacute;n), con o sin tu autorizaci&oacute;n.</span></p><p class="c4 c7"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="9"><li class="c6"><span class="c5 c10">LIMITACI&Oacute;N DE RESPONSABILIDAD</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 9.1 Bajo ninguna circunstancia, ni siquiera por negligencia, Y3A Tecnology C.A &nbsp;ni ning&uacute;n otro miembro ser&aacute; responsable de ning&uacute;n da&ntilde;o especial, fortuito, directo, indirecto o resultante (incluyendo, de manera no limitativa, da&ntilde;os por p&eacute;rdidas de ganancias comerciales, interrupci&oacute;n de la actividad comercial, p&eacute;rdida de informaci&oacute;n comercial o cualquier otra merma econ&oacute;mica) derivado del uso (o uso incorrecto) del Servicio, aun cuando Y3A Tecnology C.A &nbsp;tuviera previamente constancia de la eventual aparici&oacute;n de dichos da&ntilde;os.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5 c10">&bull; 9.2 Nada de lo dispuesto en el presente Acuerdo excluir&aacute; o limitar&aacute; la responsabilidad de Y3A Tecnology C.A : (a) fallecimiento o da&ntilde;o personal como causa de su negligencia; o (b) fraude o tergiversaci&oacute;n fraudulenta.</span></p><p class="c3 c4"><span class="c5 c10"></span></p><p class="c3"><span class="c18 c10">9.3 </span><span class="c9">XportGold</span><span class="c18 c10">&nbsp;coloca a disposici&oacute;n de los Usuarios una plataforma de intercambios de Cromos, mediante un espacio virtual que les permite ponerse en comunicaci&oacute;n mediante Internet para encontrar una forma de intercambiar sus Cromos.&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">&nbsp;no es el propietario de los Cromos ofrecidos, no tiene posesi&oacute;n de ellos ni los ofrece en venta.&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">&nbsp;no interviene en el intercambio de cromos realizado entre los Usuarios ni en las condiciones por ellos estipuladas para dicho proceso, por ello no ser&aacute; responsable respecto de la existencia, calidad, cantidad, estado, integridad o legitimidad de dichos Cromos ofrecidos, adquiridos o enajenados por los Usuarios, as&iacute; como de la capacidad para contratar de los Usuarios o de la veracidad de los Datos Personales por ellos ingresados. Cada Usuario conoce y acepta ser el exclusivo responsable de los intercambios realizados.</span></p><p class="c3"><span class="c18 c10">Debido a que&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">&nbsp;no tiene ninguna participaci&oacute;n durante todo el tiempo en que se realiza los intercambios de Cromos, ni en la posterior negociaci&oacute;n y perfeccionamiento del contrato definitivo entre las partes, son los usuarios los que responder&aacute;n por el efectivo cumplimiento de las obligaciones asumidas por ellos en el perfeccionamiento de la operaci&oacute;n. El Usuario conoce y acepta que al realizar operaciones con otros Usuarios o terceros lo hace bajo su propio riesgo. En ning&uacute;n caso&nbsp;</span><span class="c9">XportGold</span><span class="c10 c18">&nbsp;ser&aacute; responsable por lucro cesante, o por cualquier otro da&ntilde;o y/o perjuicio que haya podido sufrir el Usuario, debido a las operaciones realizadas o no realizadas por intercambio de Cromos a trav&eacute;s de&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">.</span></p><p class="c3"><span class="c9">XportGold</span><span class="c18 c10">&nbsp;recomienda actuar con prudencia y sentido com&uacute;n al momento de realizar intercambios con otros Usuarios. El Usuario debe tener presente, adem&aacute;s, los riesgos de contratar con menores o con personas que se valgan de una identidad falsa.&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">&nbsp;no ser&aacute; responsable por la realizaci&oacute;n de ofertas y/o operaciones con otros Usuarios basadas en la confianza depositada en el sistema o los Servicios brindados por&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">.</span></p><p class="c3"><span class="c18 c10">En caso que uno o m&aacute;s Usuarios o alg&uacute;n tercero inicien cualquier tipo de reclamo o acciones legales contra otro u otros Usuarios, todos y cada uno de los Usuarios involucrados en dichos reclamos o acciones eximen de toda responsabilidad a&nbsp;</span><span class="c9">XportGold</span><span class="c18 c10">&nbsp;y a sus directores, gerentes, empleados, agentes, operarios, representantes y apoderados. Los Usuarios tienen un plazo de 3 d&iacute;as a partir del momento en que se comuniquen para iniciar un reclamo contra otro u otros Usuarios. Una vez vencido este plazo, no podr&aacute;n iniciar un reclamo desde el sitio de XportGold.</span></p><p class="c21"><span class="c18 c10">El usuario solo podr&aacute; utilizar el espacio virtual de Cromos solo y &uacute;nicamente para intercambio, no se permitir&aacute; bajo ninguna circunstancia la venta de Cromos o Albumes. Si un Usuario incumple total o parcialmente lo dispuesto en el presente Acuerdo, Y3A Tecnology C.A se reserva el derecho a adoptar cualquier medida que estime oportuna.</span></p><p class="c3 c4"><span class="c18 c10"></span></p><p class="c8 c4"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="10"><li class="c6"><span class="c5 c10">SEGURIDAD Y TU CUENTA</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.1 A la cuenta de usuario s&oacute;lo se podr&aacute; acceder mediante el uso de una combinaci&oacute;n de un</span></p><p class="c3"><span class="c5">nombre de usuario &uacute;nico (&quot;Nombre de usuario&quot;), una contrase&ntilde;a &uacute;nica y secreta (&quot;Contrase&ntilde;a&quot;) y otros m&eacute;todos opcionales de autenticaci&oacute;n num&eacute;rica que el Usuario podr&aacute; seleccionar (el nombre de usuario o la direcci&oacute;n de e-mail, la contrase&ntilde;a y cualquier otra medida de autentificaci&oacute;n se denominar&aacute;n &quot;Credenciales del inicio de sesi&oacute;n&quot;). El usuario deber&aacute; elegir su propio ID de Usuario y su Contrase&ntilde;a de conformidad con las reglas relativas a los mismos.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.2 El Usuario admite que es el &uacute;nico responsable del uso del Servicio efectuado con sus Credenciales de acceso y que no las revelar&aacute; a nadie ni permitir&aacute; que otra persona use el Servicio a trav&eacute;s de su cuenta de Usuario.</span></p><p class="c3"><span class="c5">&bull; 10.3 El Usuario deber&aacute; siempre mantener sus Credenciales de acceso de manera secreta y confidencial, y deber&aacute; adoptar todas las medidas posibles para proteger la confidencialidad y el secreto de las mismas. Cualquier uso no autorizado de las Credenciales de acceso ser&aacute; exclusivamente responsabilidad del Usuario y se considerar&aacute; como realizado por este. Toda responsabilidad a este respecto incumbir&aacute; al Usuario.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.4 Un Usuario solamente puede tener una cuenta de usuario y utilizar&aacute; &uacute;nicamente el Servicio usando dicha cuenta. Al Usuario le queda completamente prohibido abrir m&uacute;ltiples cuentas. En caso de que Y3A Tecnology C.A&nbsp;descubra la existencia de cuentas adicionales abiertas por un Usuario, podr&aacute; cerrar dichas cuentas adicionales sin previo aviso y podr&aacute; confiscar los fondos de dichas cuentas adicionales.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.5 Ten en cuenta que las cantidades de dinero de tu cuenta de XportGold no generan intereses.</span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.6 El Usuario no podr&aacute; hacer apuestas a trav&eacute;s del Servicio por un importe superior a la suma total de dinero existente en su cuenta de XportGold.</span></p><p class="c4 c8"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.7 T&uacute; eres el &uacute;nico responsable de pagar las cantidades adeudadas a Y3A Tecnology C.A. Te comprometes a no rechazar ning&uacute;n d&eacute;bito y a no negar o rechazar ning&uacute;n pago hecho por ti con respecto al Servicio. Reembolsar&aacute;s a Y3A Tecnology C.A cualquier rechazo de d&eacute;bito, renuncia o rechazo de pago en el que incurras, y cualquier p&eacute;rdida que suframos en consecuencia de ello.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.8 Y3A Tecnology C.A se reserva el derecho de verificar la solvencia o la identidad de un Usuario, con un tercer organismo de referencia de cr&eacute;dito, utilizando la informaci&oacute;n proporcionada por el Usuario al registrarse en el Servicio. Los terceros que presten servicios de informaci&oacute;n o cr&eacute;dito podr&aacute;n quedarse con un documento en el que se registre la informaci&oacute;n, pero no podr&aacute;n utilizar dicha informaci&oacute;n para ning&uacute;n otro fin.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 10.9 Y3A Tecnology C.A se reserva el derecho a utilizar terceros procesadores de pagos electr&oacute;nicos o entidades financieras para procesar los pagos hechos por y para ti en relaci&oacute;n con el uso que hagas del Servicio.</span></p><p class="c8 c4"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="11"><li class="c6"><span class="c5 c10">INDEPENDENCIA DE LAS CL&Aacute;USULAS</span></li></ol><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 11.1 Si alguna de las cl&aacute;usulas del presente Acuerdo se declara il&iacute;cita, no v&aacute;lida o inexigible en una jurisdicci&oacute;n, esto no afectar&aacute; la validez o vigencia del resto de ellas en dicha jurisdicci&oacute;n, ni la validez y vigencia en otras jurisdicciones de la cl&aacute;usula en cuesti&oacute;n y las restantes disposiciones del Acuerdo.</span></p><p class="c8 c4"><span class="c2"></span></p><ol class="c1 lst-kix_list_1-0" start="12"><li class="c6"><span class="c5 c10">CESION</span></li></ol><p class="c7 c4"><span class="c2"></span></p><p class="c8"><span class="c5">&bull; 12.1 Y3A Tecnology C.A se reserva el derecho de ceder su posici&oacute;n contractual, en su totalidad o en parte, en cualquier momento y sin necesidad de comunicarlo previamente. El Usuario no podr&aacute; ceder sus derechos u obligaciones en virtud del presente Acuerdo.<br><br></span></p><ol class="c1 lst-kix_list_1-0" start="13"><li class="c6"><span class="c5 c10">DISPOSICIONES VARIAS</span></li></ol><p class="c7 c4"><span class="c2"></span></p><p class="c8"><span class="c5">&bull; 13.1 Ning&uacute;n tipo de renuncia por parte de Y3A Tecnology C.A a la ejecuci&oacute;n de cualquiera de las disposiciones del presente Acuerdo (incluyendo el no exigir la ejecuci&oacute;n estricta y literal de las cl&aacute;usulas de este Acuerdo, o la sujeci&oacute;n a estas) deber&aacute; considerarse en ning&uacute;n caso como una renuncia a sus derechos frente a cualquier futuro incumplimiento de dicha disposici&oacute;n, o de cualquier otra de las contenidas en el presente Acuerdo.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 13.2 El presente Acuerdo constituye la totalidad de lo convenido y acordado por las partes en lo concerniente al Servicio, y reemplaza cualquier contrato, acuerdo o convenio anterior entre las partes.</span></p><p class="c3"><span class="c5">&bull; 13.4 El Usuario deber&aacute; proporcionar siempre informaci&oacute;n completa y fidedigna con respecto a toda la informaci&oacute;n solicitada por Y3A Tecnology C.A&nbsp;en relaci&oacute;n con el uso del Servicio por parte del Usuario, que estar&aacute; siempre sujeto a los t&eacute;rminos y condiciones de la Pol&iacute;tica de privacidad.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c3"><span class="c5">&bull; 17.6 La versi&oacute;n en espa&ntilde;ol del presente Contrato ser&aacute; la versi&oacute;n que prevalezca en caso de discrepancias entre las traducciones del Contrato.</span></p><p class="c8 c4"><span class="c2"></span></p><p class="c8"><span class="c5">Copyright &copy; 2018 Y3A Tecnology C.A. Todos los derechos reservados.</span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3 c4"><span class="c2"></span></p><p class="c3 c4"><span class="c2"></span></p><p class="c11 c4"><span class="c14 c10"></span></p>
          </div>
          <div class="modal-footer modalFooter_xg">
            <button  type="button" class="btn btnAcceptXG btn-sm" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    
    @extends('layoutLogin');
    
    </section>
    
@endsection

@section('scripts')
  <script src="{{ asset('js/register.js') }}?v={{ env('VERSION_APP') }}"></script>
@endsection
