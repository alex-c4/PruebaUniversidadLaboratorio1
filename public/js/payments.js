

var showAlert = function(msg){
    $.alert({
        title: 'Información!',
        content: msg,
        type: 'dark',
        typeAnimated: true,
        columnClass: "col-md-6",
    });
}

var registerTransaction = function(details){
    var _url = $("#hRouteregisterTransaction").val();
    var _token = $("#token").val();
    var _data = {
        details: details
    };

    $.ajax({
        url: _url,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.result == true){
            showAlert('Transacción completada, muchas gracias Sr(a) ' + details.purchase_units[0].shipping.name.full_name + '!');
        }else{
            showAlert(data.message);
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        showAlert('Hubo un problema registrando la transacción en nuestro sistema, por favor, ingrese a nuestro sistema en la sección de "<b>Pagos</b>" y acceda a "<b>Registrar pagos manuales</b>", rellene por favor la información que allí se le solicita, </br> Se le estará informando en la brevedad posible cuando el pago se abone a su cuenta. Muchas gracias por participar en nuestros XportGames y disculpen los inconvenientes');
    })
}

var addZero = function(value){
    var result;
    if(value < 10){
        result = "0" + value;
    }else{
        result = value;
    }
    return result;
}

$('#changeStatusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var _idPayment = button.data('payment');
    
    var modal = $(this)
    modal.find('#hIdPayment').val(_idPayment);

    var _url = $("#hSearchPaymentInfo").val();
    var _token = $("#token").val();

    var _data = {
        idPayment: _idPayment
    };

    Utils.bootstrapAlert_show("divAlert", "idAlert", "Por favor espere mientras se carga la información...");
    
    Utils.AJAXFunction(_url, _token, _data)
        .then(function(_result){
            var info = _result[0];
            fillField(info);

            Utils.bootstrapAlert_close("idAlert");

        })
        .fail(function(jqXHR, textStatus, errorThrown){
            Utils.bootstrapAlert_close("idAlert");

        })
});



var fillField = function(_obj){
    $("#names").val(_obj.name + " " + _obj.lastName);
    $("#amountReal").html("Monto real de la operaión: (<b>" + _obj.amount + "</b>)")
    var _amount = Utils.calcToAmountSent(_obj.amount);
    $("#amount").val(_amount);
    $("#id_paypal").val(_obj.id_paypal);
    $("#created_at").val(_obj.created_at);
    
}

$("#form_update_status").on("submit", function(){
    var _rdValue = $('input:radio[name=rdStatus]:checked').val();
    if(_rdValue === undefined){
        Utils.bootstrapAlert_show("divAlert", "idAlert", "Por favor seleccione el estatus del pago")
        return false;
    }

    _type = "dark";

        $.confirm({
            title: "Información",
            content: "Por favor confirmar la actualización del pago, ¿Desea continuar?",
            type: "dark",
            columnClass: "col-md-6",
            animationBounce: 2.5,
            buttons: {
                confirm: {
                    text: "Si",
                    btnClass: "btn-blue",
                    action: function(){
                        Utils.disableButtons("btnSendInvitation");
                        document.getElementById("form_update_status").submit()
                    }
                },
                cancel: {
                    text: "No",
                    action: function(){
                        return true;
                    }
                }
            }
        });
    
        return false;

})



$(function() {
    
    $("#amount").number(true, 2, ",", ".");

});