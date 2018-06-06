$('#enviarQuiniela').on('click',function() {
    
    var _quiniela = $("#quiniela_id").val();
    if (_quiniela==0) {
        var messageError='Debe seleccionar una quiniela para realizar la consulta!!'
        $('#messageError-got').html('<div class="alert alert-warning" role="alert">' + messageError + '</div>');       
        return false ;
    }else{
    //alert('quiniela:'+_quiniela);
    return;
    }
});

/*$('#form_list_quinielas').submit(function() {
    // var _email = $("#inputEmail").val();
    // var _password = $("#inputPassword").val();
    var _route = $(this).attr('action'); //$("#routeCurrent").val();
    // var _route2 = $("#routeCurrent").val();
    var _routeDashboard = $("#routeDashboard").val();
    var _token = $("#token").val();
    
    // console.log($(this).serialize());
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: $(this).serialize()
    })
    .done(function(data, textStatus, jqXHR){
            if(data.access == true){
                console.log(_routeDashboard)
                $(location).attr('href', _routeDashboard);
            }else{
                console.log(data.message);
                $('#message-got').html('<div class="alert alert-warning" role="alert">' + data.message + '</div>');                
            }
            console.log(data);
        })
    .fail(function(jqXHR, textStatus, errorThrown ){
            console.log(jqXHR.responseJSON.errors);

            if(jqXHR.responseJSON.errors.hasOwnProperty( 'email' )){
                console.log("Email: " + jqXHR.responseJSON.errors.email[0])
            }
            if(jqXHR.responseJSON.errors.hasOwnProperty( 'password' )){
                console.log("Pass: " + jqXHR.responseJSON.errors.password[0])
            }
        })

    console.log("Route")
    

    return false;
});
*/