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