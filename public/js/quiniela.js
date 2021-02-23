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
                    $.alert('Cancelado!')
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
            _html += "<div class='col-6 text-center font-weight-bolder' style='display: flex; align-items: center; justify-content: center;'>" +
                    "" + item.userName + " " + item.userLastName +
                    "</div>" +
                    "<div class='col-3'>" +
                    "    <div class='resultadoRight text-center'>" + item.pronostic_club_1 + "</div>" +
                    "</div>" +
                    "<div class='col-3'>" +
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