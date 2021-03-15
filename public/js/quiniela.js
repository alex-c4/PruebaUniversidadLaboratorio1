// funcion AJAX para la busqueda de los juegos
$('#quiniela_id').on('change', function(){

    console.log('CDSGGM')
    showHtmlUpdate_2('Cargando...');

    var games_id = $(this).val();
    debugger
    requestGames(games_id);

    
    hideHtmlUpdate_2();
});

var requestGames = function(games_id){
    var _route = $("#routeCurrent").val();
    var _url = _route + '/quiniela/searchGames/' + games_id;
}

var showHtmlUpdate_2 = function(mensaje){
    var htmlUpdate = '<div class="alert alert-info" role="alert">' +
                     '' + mensaje + '' +
                     '</div>';
    $('#div-container-quinielaPanel').html(htmlUpdate);
}

var hideHtmlUpdate_2 = function(){
    $('#div-container-quinielaPanel').html('');
}

var updatePronostic = function(pronostic_id){
    
    $('#btnUpdatePronostic').attr("disabled", true);

    setTimeout(() => {
        $('#btnUpdatePronostic').attr("disabled", false);
    }, 2500);

    var _route = $("#routeCurrent").val();

    var _url = _route + '/quiniela.updatePronostic';

    var _token = $("#token").val();
    
    var pronostic_club_1 = $("#input_" + pronostic_id + "_1").val();
    var pronostic_club_2 = $("#input_" + pronostic_id + "_2").val();

    var _data = {
        pronostic_id: pronostic_id,
        pronostic_club_1: pronostic_club_1,
        pronostic_club_2: pronostic_club_2
    };

    $.confirm({
        title: 'Confirmar',
        content: 'Por favor confirmar si ud desea modificar los goles',
        type: 'dark',
        columnClass: 'col-md-6',
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: 'Si',
                btnClass: 'btn-blue',
                action: function(){
                    $.ajax({
                        url: _url,
                        headers: { 'X-CSRF-TOKEN': _token },
                        type: 'POST',
                        data: _data
                    })
                    .done(function(data, textStatus, jqXHR){
                        console.log(data)
                        if(data.result){
                            $("#actualizado_" + pronostic_id).html('<i class="fa fa-check fa-sm">Actualizado</i>');
                        }
                        
                        $.alert({
                            title: 'Información',
                            content: data.message
                        });
                    })
                    .fail(function(jqXHR, textStatus, errorThrown ){
                        debugger
                        console.log(jqXHR.responseJSON.errors);
                        $.alert({
                            title: 'Información',
                            content: 'Error actualizando la informacion',
                        });
                    })
                }
            },
            cancel: {
                text: 'No',
                action: function(){
                    $.alert({
                        title: 'Información',
                        content: 'Cancelado!'
                    })
                }
            }
        }
    });
}

$("#btnAddPronostic").on('click', function(){
    $.confirm({
        title: 'Información',
        content: 'Se le informa que aquellos pronósticos que esten vacios, es decir, no hayan colocado algún valor, el sistema tomará como valor por defecto cero ( 0 ), recuerde que también tendrá la oportunidad de cambiar el resultado en el modulo de pronósticos, este módulo estará habilitado hasta horas antes del inicio del primer encuentro',
        type: 'dark',
        columnClass: 'col-md-6',
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: 'Ok',
                btnClass: 'btn-blue',
                action: function(){
                    // $.alert('Acepto!')
                    $('#btnAddPronostic').attr("disabled", true);
                    $("#formAddPronostics").submit();
                }
            },
            cancel: {
                text: 'Cancelar',
                action: function(){
                    // $.alert('Cancelado!')
                }
            }
        }
    });
})

$("#btnAddPronosticByPhase").on('click', function(){
    $.confirm({
        title: 'Información',
        content: 'Se le informa que aquellos pronósticos que esten vacios, es decir, no hayan colocado algún valor, el sistema tomará como valor por defecto cero ( 0 )',
        type: 'dark',
        columnClass: 'col-md-6',
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: 'Ok',
                btnClass: 'btn-blue',
                action: function(){
                    // $.alert('Acepto!')
                    $('#btnAddPronosticByPhase').attr("disabled", true);
                    $("#formAddPronosticsByPhase").submit();
                }
            },
            cancel: {
                text: 'Cancelar',
                action: function(){
                    // $.alert('Cancelado!')
                }
            }
        }
    });
});


$('#compareModal').on('show.bs.modal', function (event) {
    var idImgA, idImgB, idgame, idquiniela;
    var button = $(event.relatedTarget);
    var imgA = button.data('imga');
    var imgB = button.data('imgb');
    var nameA = button.data('namea');
    var nameB = button.data('nameb');
    idgame = button.data('idgame');
    idquiniela = button.data('idquiniela');

    idImgA = $("#" + imgA).attr("src");
    idImgB = $("#" + imgB).attr("src");

    var modal = $(this)

    modal.find("#modalImgA").attr("src", idImgA);
    modal.find("#modalImgB").attr("src", idImgB);
    modal.find("#spanNameA").html(nameA);
    modal.find("#spanNameB").html(nameB);

    var _url = $("#routeComparePronostic").val();
    var _token = $("#token").val();
    var _data = {
        id_quiniela: idquiniela,
        id_game: idgame
    };

    $.ajax({
        url: _url,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        var _result = data.data;
        var _html = "";
        $("#modalContent").html("");

        _result.forEach(item => {
            _html += "<div class='col-4 text-center font-weight-bolder' style='display: flex; align-items: center; justify-content: center; font-weight: bold;'>" +
                    "" + item.userName + " " + item.userLastName +
                    "</div>" +
                    "<div class='col-4'>" +
                    "    <div class='resultadoRight text-center'>" + item.pronostic_club_1 + "</div>" +
                    "</div>" +
                    "<div class='col-4'>" +
                    "    <div class='resultadoLeft text-center'>" + item.pronostic_club_2 + "</div>" +
                    "</div>";
        });

        $("#modalContent").html(_html);
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        debugger
    })
});

// $("#btnComparePronostic_bk").on("click", function(e){
//     debugger
//     var idImgA, idImgB;
//     var button = $("#" + this.id)[0].dataset; //$(e.relatedTarget); //$("#btnComparePronostic");
//     var modal = $("#compareModal");
//     idImgA = $("#" + button.imga).attr("src");
//     idImgB = $("#" + button.imgb).attr("src");

//     modal.find("#modalImgA").attr("src", idImgA);
//     modal.find("#modalImgB").attr("src", idImgB);
//     modal.find("#spanNameA").html(button.namea);
//     modal.find("#spanNameB").html(button.nameb);


    

// });
    var iconFormatter = function(value){
        return '<button id="removeEmail" onclick="removeEmail(' + value + ')" class="btn btn-outline-danger btn-sm">' +
                '<i class="fa fa-trash"></i></button>';
    }

    var removeEmail = function(value){
        console.log(value);
    }

    var fillTableTmp = function(){
        // data = [
        //     {
        //         "idx": 1, "email": "alex1@hto.com"
        //     },
        //     {
        //         "idx": 2, "email": "alex2@hto.com"
        //     },
        //     {
        //         "idx": 3, "email": "alex3@hto.com"
        //     }
        // ];
        // console.log(data);
        // $("#tblInviteFriends").bootstrapTable('load', data);
    }

// $(function() {
//     console.log( "ready!" );
//     fillTableTmp();
// });

var onclick_removeEmail = function(id){
    $("#" + id).remove();
    var _index = EMAILS_GLOBAL.findIndex(item => item.id == id);
    EMAILS_GLOBAL.splice(_index,1);

}

$("#btnAddEmail").on("click", function(){
    var _email = $("#txtEmail").val();
    addEmail(_email);
});

var INDEX_GLOBAL = 0;
var EMAILS_GLOBAL = [];
var IDXG_GLOBAL = 0;
var addEmail = function(email){
    
    var isValid = isValidEmail(email);

    if(isValid){
        var _isAlreadyExit = isAlreadyExist(email);
        if(!_isAlreadyExit){

            var _container = $(".containerEmails");
            _idx = INDEX_GLOBAL++;
            var _html = '<div class="childContainerEmails text-sm" id="e' + _idx.toString() + '" name="e' + _idx.toString() + '">' +
                        '    ' + email + ' &nbsp;' +
                        '    <button type="button" class="close iconClose" onclick="onclick_removeEmail(\'e'+ _idx.toString() +'\')">' +
                        '        <span aria-hidden="true">&times;</span>' +
                        '    </button>' +
                        '</div>';
            _container.append(_html);
            EMAILS_GLOBAL.push({
                "id": "e" + _idx.toString(),
                "email": email
            });

            $("#txtEmail").val("");
        }else{
            showAlert('El correo electrónico ya existe, por favor validar!');
        }
    }else{
        showAlert('El correo electrónico es incorrecto, por favor validar!');
    }
    document.getElementById("txtEmail").focus();
}


var isValidEmail = function(email){
    
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == true){
        return true;
    }else{
        return false
    }
}

var showAlert = function(msg){
    $.alert({
        title: 'Informacion!',
        content: msg,
        type: 'dark',
        typeAnimated: true,
        columnClass: "col-md-6",
    });
}

var isAlreadyExist = function(email){
    try {
        var _email = EMAILS_GLOBAL.find(item => item == email );

        return _email != undefined;
    } catch (error) {
        return false;
    }
}

var getEmailToSend = function(){
    var _arrTmp = [];
    EMAILS_GLOBAL.forEach(item => _arrTmp.push(item.email));
    return _arrTmp;
}

$("#btnSendInvitation").on("click", function(){

    var _url = $("#hRouteSendInvitatios").val();
    var _token = $("#token").val();
    var _data = {
        emails: getEmailToSend(),
        idxg: IDXG_GLOBAL
    };

    $.confirm({
        title: 'Confirmar',
        content: 'Por favor confirmar si ud desea enviar la invitación',
        type: 'dark',
        columnClass: 'col-md-6',
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: 'Si',
                btnClass: 'btn-blue',
                action: function(){

                    //bloquear boton
                    disableButtons();

                    $.ajax({
                        url: _url,
                        headers: { 'X-CSRF-TOKEN': _token },
                        type: 'POST',
                        data: _data
                    })
                    .done(function(data, textStatus, jqXHR){
                        debugger
                        $("#inviteFriendsModal").modal('hide');
                    })
                    .fail(function(jqXHR, textStatus, errorThrown ){
                        debugger
                    })
                    .complete(function(data){
                        enableButtons();
                        showAlert(data.message);
                        $(".containerEmails").html("");
                    })

                }
            },
            cancel: {
                text: 'No',
                action: function(){
                    // code...
                }
            }
        }
    });

})

$('#inviteFriendsModal').on('show.bs.modal', function (event) {
    var id;
    var button = $(event.relatedTarget);
    IDXG_GLOBAL = button.data('idxg');
})

var disableButtons = function(){
    $("#btnSendInvitation").text("Enviando...")
    $("#btnSendInvitation").prop("disabled", true)
}

var enableButtons = function(){
    $("#btnSendInvitation").text("Enviar invntación")
    $("#btnSendInvitation").prop("disabled", false)
}

$("#type_id").on("change", function(){
    
    var _val = $("#type_id").val();

    switch (_val) {
        case "1":
            contract();
            // $("#amount").val("0");
            // $("#amount").prop("disabled", true);
            // widthAmountField("100%", 300);
            // opacityGoldpotField(1, 1000);
            break;
        default:
            expand();
            // $("#amount").prop("disabled", false);
            // opacityGoldpotField(0, 300);
            // widthAmountField("200%", 1000);
            break;
    }
});

var contract = function(){
    $("#amount").val("0");
    $("#amount").prop("disabled", true);
    widthAmountField("100%", 600, function(){
        opacityGoldpotField(1, 1000);
    });
}

var expand = function(){
    $("#amount").prop("disabled", false);
    opacityGoldpotField(0, 300);
    widthAmountField("200%", 600, () => {});
}

var opacityGoldpotField = function(_opacity, _duration){
    $("#goldpot").animate({opacity: _opacity}, _duration);
    $("#goldporLabel").animate({opacity: _opacity}, _duration);
}

var widthAmountField = function(_width, _duration, callback){
    $("#amount").animate({width: _width}, _duration, function(){
        callback();
    });
}

$(function() {
    $("#type_id").trigger("change", () => {});
});
