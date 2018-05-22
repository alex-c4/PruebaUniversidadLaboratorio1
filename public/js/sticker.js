// funcion AJAX para la busqueda de las Barajitas
$('#album_id').on('change', function(){
    showHtmlUpdate('Cargando...');

    var album_id = $(this).val();
    
    requestSticker(album_id);
    
});

$('#btn-update').on('click', function(){
    showHtmlUpdate('Actualizando...');

    var album_id = $("#album_id").val();

    requestSticker(album_id);
    
    /**
     * Deshabilitando boton por 1 inuto
     */
    $('#btn-update').prop('disabled', true);
    setTimeout(() => {
        $('#btn-update').prop('disabled', false);
    }, 5000);
});

var requestSticker = function(album_id){
    
    var _route = $("#routeCurrent").val();
    var _url = _route + '/stickers/' + album_id;

    
    var _html = '';
    if(album_id != 0){
        $.get(_url)
        .done(function(data, textStatus, jqXHR){

            window.listStickerGot = data[0];

            // redenderiza el panel de barajitas adquiridas
            toRenderStickerGot(data[0], 1);

            // redenderiza el panel de barajitas por intercambiar
            toRenderStickerWaiting(data[1], 2);
            
            hideHtmlUpdate();
            
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            hideHtmlUpdate();
            console.log(jqXHR);
        });

    }else{
        $('#albumListGot').html(_html);
        $('#albumListWaiting').html(_html);
        hideHtmlUpdate();
    }
}

var showHtmlUpdate = function(mensaje){
    var htmlUpdate = '<div class="alert alert-info" role="alert">' +
                     '' + mensaje + '' +
                     '</div>';
    $('#div-container-stickerPanel').html(htmlUpdate);
}
var hideHtmlUpdate = function(){
   $('#div-container-stickerPanel').html('');
}

var toRenderStickerGot = function(data, panel){
    var _html = '';
    var color = 'primary';
    // var data_infosticker = 0;
    for(var i = 0; i < data.length; i++){

        // data_infosticker = i + 1;

        _html += '<div class="col-sm-1" style="padding: 1px">';

        color = getColor(data[i].quantity)
        _html += '<button id="btnSticker_' + data[i].number + '" name="btnSticker_' + data[i].number + '" type="button" class= "btn btn-' + color + ' btn-sm btn-block" data-toggle="modal" data-target="#stickerModal" data-infosticker="' + i + '">' + data[i].number + '</button>';
        _html += '</div>';
    }

    $('#albumListGot').html(_html);
    
    
}

var toRenderStickerWaiting = function(data, panel){
    var _html = '';
    var color = 'primary';
    // var data_infosticker = 0;
    for(var i = 0; i < data.length; i++){

        // data_infosticker = i + 1;

        _html += '<div class="col-sm-1" style="padding: 1px">';

        color = getColor(data[i].quantity)
        
        if(data[i].quantity > 0){
            _html += '<button onclick="showModalToExchange(' + data[i].number + ')" id="btnSticker_' + data[i].number + '" name="btnSticker_' + data[i].number + '" type="button" class= "btn btn-' + color + ' btn-sm btn-block" data-toggle="modal" data-target="#stickerModal2" data-infosticker="' + i + '">' + data[i].number + '</button>';
        }else{
            _html += '<button disabled id="btnSticker_' + data[i].number + '" name="btnSticker_' + data[i].number + '" type="button" class= "btn btn-' + color + ' btn-sm btn-block"  >' + data[i].number + '</button>';
        }

        _html += '</div>';
    }

     $('#albumListWaiting').html(_html);
    
}

/**
 * Funcion para obtener las personas o usuario para un posible intercambio
 */
var showModalToExchange = function(number){
    var album_id = $("#album_id option:selected").val();
        
    var _route = $("#routeCurrent").val();
    var _url = _route + '/stickers/contactUser';
    var _token = $("#token").val();

    var _data = {
        album_id: album_id,
        number: number
    }

    $.ajax({
        url: _url,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        console.log(data);
        var _html = '';
        _html += '<table class="table">'+
                    '<thead>' +
                        '<tr>' +
                        '<th scope="col">&nbsp;</th>' +
                        '<th scope="col">Nombre</th>' +
                        '<th scope="col">Apellido</th>' +
                        '<th scope="col">&nbsp;</th>' +
                        '</tr>' +
                    '</thead>' +
                    '<tbody>';
        for(var i = 0; i < data.length; i++){
            _html += '<tr>' +
                        '<th scope="row"><i class="fa fa-user-o fa-lg"></i></th>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].lastName + '</td>' +
                        '<td><button onclick="btnSendEmail(' + data[i].stickerId + ', ' + data[i].userId + ')" type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-envelope"></i></i></button></td>' +
                    '</tr>';
        }

        _html += '</tbody>' +
                '</table>';
        $('#stickerUserList').html(_html);
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        console.log(jqXHR.responseJSON.errors);
        // $('#message-got').html('<div class="alert alert-danger" role="alert">Error en el registro! </div>');

    })
}

var btnSendEmail = function(sticker_id, user_id){
    var _route = $("#routeCurrent").val();
    var _url = _route + '/stickers/sentEmailToUser';

    var _token = $("#token").val();

    var _data = {
        sticker_id: sticker_id,
        user_id: user_id
    };

    $.confirm({
        title: 'Confirmar',
        content: 'Por favor confirmar si ud desea enviar el correo electrónico',
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
                        
                        $.alert({
                            title: 'Información',
                            content: data
                        });
                    })
                    .fail(function(jqXHR, textStatus, errorThrown ){
                        console.log(jqXHR.responseJSON.errors);
                        $.alert({
                            title: 'Información',
                            content: 'Error enviando el correo electrónico, por favor intente nuevamente',
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

/**
 * Script para agregar los valores del sticker seleccionado en el panel de sticker
 * al modal abierto al hacer click en algun boton de los sticker
 */
$('#stickerModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('infosticker') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    // var albid = $("#album_id option:selected").val();
    // var albname = $("#album_id option:selected").text();
    
    var number = window.listStickerGot[recipient].number;
    var quantity = window.listStickerGot[recipient].quantity;
    var album_id = window.listStickerGot[recipient].album_id;
    var sticker_id = window.listStickerGot[recipient].id;

    modal.find('.num-sticker').text("#" + number);
    modal.find('.modal-body #txtquantity').val(quantity);
    modal.find('.modal-body #htxtalbid').val(album_id);
    modal.find('.modal-body #htxtstickerid').val(sticker_id);
    modal.find('.modal-body #htxtnumber').val(number);

    // var _html = '<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button> &nbsp;' +
    //             '<button type="button" id="btnRegisterSticker" name="btnRegisterSticker" class="btn btn-success btn-sm" >Registrar</button>';
    // $('#modal-footer-content').html(_html);
    $('#message-got').html('');

})
$('#stickerModal2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('infosticker') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    // var albid = $("#album_id option:selected").val();
    // var albname = $("#album_id option:selected").text();
    
    var number = window.listStickerGot[recipient].number;
    var quantity = window.listStickerGot[recipient].quantity;
    var album_id = window.listStickerGot[recipient].album_id;
    var sticker_id = window.listStickerGot[recipient].id;

    modal.find('.num-sticker').text("#" + number);
    modal.find('.modal-body #txtquantity').val(quantity);
    modal.find('.modal-body #htxtalbid').val(album_id);
    modal.find('.modal-body #htxtstickerid').val(sticker_id);
    modal.find('.modal-body #htxtnumber').val(number);
})


$('#btnRegisterSticker').on('click', function (event) {
    var _sticker_id = $("#htxtstickerid").val();
    var _number = $("#htxtnumber").val();
    var _quantity = $("#txtquantity").val();
    var _album_id = $("#htxtalbid").val();
    var _token = $("#token").val();

    var _route = $("#routeCurrent").val();
    var _url = _route + '/stickers/save';
    
    var _data = {
        sticker_id: _sticker_id,
        number: _number,
        quantity: _quantity,
        album_id: _album_id
    }

    if(validateRegisterSticker(_data)){
        $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: _data
        })
        .done(function(data, textStatus, jqXHR){

            if(data.success == 'true'){
                var _sticker_id = data.sticker_id;
                // btn btn-outline-' + color + 
                $('#btnSticker_' + _number).attr('class', 'btn btn-' + getColor(_quantity) + ' btn-sm btn-block');

                window.listStickerGot[parseInt(_number) - 1].quantity = parseInt(_quantity)
                window.listStickerGot[parseInt(_number) - 1].id = parseInt(_sticker_id)

                $('#htxtstickerid').val(data.sticker_id);

                $('#message-got').html('<div class="alert alert-success" role="alert">Registro satisfactorio! </div>');

                // var _html = '<div>' +
                //             '<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>'+
                //             '</div>';
                // $('#modal-footer-content').html(_html);
                
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            console.log(jqXHR.responseJSON.errors);
            $('#message-got').html('<div class="alert alert-danger" role="alert">Error en el registro! </div>');
            

        })
    }else{
        $.alert({
            title: 'Información',
            content: 'Información incorrecta, por favor verifique en intente nuevamente',
            type: 'dark',
            columnClass: 'col-md-6',
            animationBounce: 2.5,
        });
    }

});


var getColor = function(quantity){
    if(quantity == 0) color = 'outline-secondary';
    if(quantity == 1) color = 'success';
    if(quantity > 1) color = 'warning';

    return color;
}

var validateRegisterSticker = function(data){
    try{
        var expReg = /^([1-9])+([0-9])*$/
        return expReg.test(parseInt(data.quantity));

    }catch(ex){
        console.log(ex);
        return false;
    }
}