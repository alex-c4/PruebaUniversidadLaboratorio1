// funcion AJAX para la busqueda de las Barajitas
$('#album_id').on('change', function(){
    var _route = $("#routeCurrent").val();
    var album_id = $(this).val();
    var _url = _route + '/api/stickers/' + album_id;

    var _html = '';
    if(album_id != 0){
        $.get(_url)
        .done(function(data, textStatus, jqXHR){

            console.log(data);
            window.listStickerGot = data[0];

            // redenderiza el panel de barajitas adquiridas
            toRenderStickerGot(data[0], 1);

            // redenderiza el panel de barajitas por intercambiar
            toRenderStickerWaiting(data[1], 2);
            
            
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            console.log(jqXHR);
        });

    }else{
        $('#albumListGot').html(_html);
        $('#albumListWaiting').html(_html);
    }
});

var toRenderStickerGot = function(data, panel){
    console.log(data)
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
    console.log(data)
    var _html = '';
    var color = 'primary';
    // var data_infosticker = 0;
    for(var i = 0; i < data.length; i++){

        // data_infosticker = i + 1;

        _html += '<div class="col-sm-1" style="padding: 1px">';

        color = getColor(data[i].quantity)
        _html += '<button id="btnSticker_' + data[i].number + '" name="btnSticker_' + data[i].number + '" type="button" class= "btn btn-' + color + ' btn-sm btn-block" data-toggle="modal" data-target="#stickerModal2" data-infosticker="' + i + '">' + data[i].number + '</button>';
        _html += '</div>';
    }

     $('#albumListWaiting').html(_html);
    
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
    // var _token = $("#token").val();

    var _route = $("#routeCurrent").val();
    var _url = _route + '/api/stickers/save';

    var _data = {
        sticker_id: _sticker_id,
        number: _number,
        quantity: _quantity,
        album_id: _album_id
    }

    $.post(_url, _data, null, "json")
        .done(function(data){
            console.log(data);

            if(data.success == 'true'){
                // btn btn-outline-' + color + 
                $('#btnSticker_' + _number).attr('class', 'btn btn-' + getColor(_quantity) + ' btn-sm btn-block')

                $('#message-got').html('<div class="alert alert-success" role="alert">Registro satisfactorio! </div>');
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            
            console.error(jqXHR);
            
            $('#message-got').html('<div class="alert alert-danger" role="alert">Error en el registro! </div>');
        })

});

var getColor = function(quantity){
    if(quantity == 0) color = 'outline-secondary';
    if(quantity == 1) color = 'success';
    if(quantity > 1) color = 'warning';

    return color;
}