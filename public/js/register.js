$(function() {
    var resolvedOptions = Intl.DateTimeFormat().resolvedOptions();
    $("#hTimeZone").val(resolvedOptions.timeZone);
});

var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

$('#form_register_user').on('submit', function() {
    $('#btnAceptar').attr("disabled", true);
    $('#btnAceptar').html("Enviando...");
});

$('#form_user_contact').on('submit', function() {
    var _route = $(this).attr('action');
    var _token = $("#token").val();
    var _data = $(this).serialize()

    if(!regex.test($('#emailContact').val().trim())){
        $('#emailContact').select();
        return false;
    }

    sendForm(_route, _token, _data, 'contact');

    return false;
});

$('#form_user_email').on('submit', function() {
    var _route = $(this).attr('action');
    var _token = $("#token").val();
    var _data = $(this).serialize()

    if(!regex.test($('#email_only').val().trim())){
        $('#email_only').select();
        return false;
    }
    
    sendForm(_route, _token, _data, "only_email");

    return false;
});

var sendForm = function(_route, _token, _data, _form_id){
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
            showAlert('Información', data.message, 'dark');
            clearForm(_form_id);
        }else{
            showAlert('Información', data.message, 'orange');
            console.log(data.exeption);
        }
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        
        console.log(jqXHR.responseJSON.errors);

        if(jqXHR.responseJSON.errors.hasOwnProperty( 'email' )){
            console.log("Email: " + jqXHR.responseJSON.errors.email[0])
        }
        if(jqXHR.responseJSON.errors.hasOwnProperty( 'password' )){
            console.log("Pass: " + jqXHR.responseJSON.errors.password[0])
        }
        if(jqXHR.responseJSON.errors.hasOwnProperty( 'passwordLogin' )){
            console.log("Pass: " + jqXHR.responseJSON.errors.passwordLogin)
            $('#messagegot').html('<div class="alert alert-warning" role="alert">' + jqXHR.responseJSON.errors.passwordLogin + '</div>');                
        }
    })
}

var showAlert = function(_title, _message, _type){
    
    $.alert({
        title: _title,
        icon: 'fa fa-info-circle',
        content: _message,
        animation: 'zoom',
        closeAnimation: 'bottom',
        backgroundDismiss: true,
        type: _type,
        columnClass: 'medium',
        buttons: {
            okay: {
                text: 'Ok',
                btnClass: 'btn-blue',
                action: function(){
                    // do nothing
                }
            }
        }
    });
}

var clearForm = function(_form_id){
    switch(_form_id){
        case "contact":
            $("#nameContact").val("");
            $("#emailContact").val("");
            $("#subjectContact").val("");
            $("#messageContact").val("");
        break;
        case "only_email":
            $("#email_only").val("");
        break;
    }
}