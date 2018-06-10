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
                        
                        $("#actualizado_" + pronostic_id).html('<i class="fa fa-check fa-sm">Actualizado</i>');
                        $.alert({
                            title: 'Información',
                            content: data
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