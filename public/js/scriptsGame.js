var Game = {
    _token: $("#token").val(),
    getBootstrapTable: function(){
        return $("#tblGames");
    },
    clearFieldGames: function(){
        $('#club1').selectpicker('val', "");
        $('#club2').selectpicker('val', "");
        // $('#date').val("");
        $('#time').val("");
        $('#stadium').selectpicker("val", "");
    },
    clearFieldStadium: function(){
        $('#nameStadium').val("");
    },
    clearFieldClub: function(){
        $("#nombre").val("");
        $("#short_name").val("");
        $("#country").selectpicker('val', "");
        $("#league").selectpicker('val', "");
        $("#imagen_logo").val("")

    },
    updateList: function(field, data){
        field.append($('<option>', {
            value: data.id,
            text: data.name,
            selected: "selected"
        }));
        field.selectpicker('refresh');
        field.selectpicker('val', data.id);
    }
}

//Crear Estadios
$("#btnSaveStadium").on("click", function(){
    var _route = $("#routeCurrent").val();
    // var _token = $("#token").val();
    var _token = Game._token;
    _data = {
        'nameStadium': $("#nameStadium").val()
    }
    
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data){
        
        if(data.result == true){
            $('#stadium').append($('<option>', {
                value: data.id,
                text: data.name,
                selected: "selected"
            }));

            $('#stadium').selectpicker('refresh');
            
            $('#stadium').selectpicker('val', data.id);

            $("#addMessage").html("Estadio agregado correctamente");

            //limpiar campo
            Game.clearFieldStadium();
        }else{
            $("#addMessage").html(data.message);
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
        console.log(jqXHR.responseJSON.errors);
    })

});

//Crear juegos
$("#form_create_games").on("submit", function(e){
    //debugger
    e.preventDefault();
    $("#btnAceptar").prop("disabled", true);
    var _route = $(this).attr('action');
    var _token = Game._token;

    var formData = {
        "championships": $("#championships").val(),
        "club1": $("#club1").val(),
        "club2": $("#club2").val(),
        "hClub1": $("#hClub1").val(),
        "hClub2": $("#hClub2").val(),
        "fase": $("#fase").val(),
        "group": $("#group").val(),
        "date": $("#date").val(),
        "time": $("#time").val(),
        "stadium": $("#stadium").val()
    }

    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: formData,
    })
    .done(function(data){
        if(data.result){
            // actualizar tabla de juegos
            $("#tblGames").bootstrapTable('load', data.game);
            //limpieza de campos del formulario
            Game.clearFieldGames();

            $("#club1").focus();
        }else{
            $.alert({
                title: 'Información',
                content: data.message
            });
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
        console.log(jqXHR.responseJSON.errors);
    })
    .complete(function(jqXHR, textStatus ){
        $("#btnAceptar").prop("disabled", false);
    })
});

// obtener juegos de un campeonato
$("#championships").on("change", function(){
    var id = this.value;
    var _route = $("#routeGetGames").val();
    var _token = Game._token;
    _data = {
        'championship_id': id
    };

    if(id != ""){
        $.ajax({
            url: _route,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: _data
        })
        .done(function(data){
            $("#tblGames").bootstrapTable('load', data);
            
        })
        .fail(function(jqXHR, textStatus, errorThrown ){   
            console.log(jqXHR.responseJSON.errors);
        })
    }else{
        $("#tblGames").bootstrapTable('removeAll');

    }


});

//Crear club
$("#form_create_clubs").on("submit", function(e){
    
    e.preventDefault();
    $("#btnSaveClub").prop("disabled", true);

    var formData = new FormData(document.getElementById("form_create_clubs"));

    var _route = $(this).attr('action'); //$("#routeGetGames").val();
    var _token = Game._token;
    
    $.ajax({
        url: _route,
        dataType: "html",
        contentType: false,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: formData,
        processData: false
    })
    .done(function(result){
        
        data = JSON.parse(result);
        if(data.result == true){
            switch (data.hClub) {
                case "c1":
                    Game.updateList($('#club1'), data);
                    document.getElementById("hClub1").value = data.name;
                    // $('#club1').append($('<option>', {
                    //     value: data.id,
                    //     text: data.name,
                    //     selected: "selected"
                    // }));
                    // $('#club1').selectpicker('refresh');
                    // $('#club1').selectpicker('val', data.id);
                break;
                case "c2":
                    Game.updateList($('#club2'), data);
                    document.getElementById("hClub2").value = data.name;
                    // $('#club1').append($('<option>', {
                    //     value: data.id,
                    //     text: data.name,
                    //     selected: "selected"
                    // }));
                    // $('#club1').selectpicker('refresh');
                    // $('#club1').selectpicker('val', data.id);
                break;
            }

            $("#clubModal").modal("hide");
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
        console.log(jqXHR.responseJSON.errors);
    })
    .complete(function(jqXHR, textStatus ){
        $("#btnSaveClub").prop("disabled", false);
    })
    

    return false;
});

$('#clubModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('club');
    var modal = $(this)
    modal.find('#hClub').val(recipient);

})

// mostrar boton para borrar juego
function iconFormatter(value) {
    return '<button id="removeGame" onclick="removeGame(' + value + ')" class="btn btn-outline-danger btn-sm">' +
                '<i class="fa fa-trash"></i></button>';
}

//borrar juego
function removeGame(id_game){
    
    var _route = $("#hRouteDeleteGame").val();
    var _token = Game._token;
    var _data = {
        "id": id_game
    };

    $.confirm({
        title: "Confirmar",
        content: "¿Desea realmente eliminar el juego?",
        type: 'dark',
        columnClass: "col-md-6",
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: "Si",
                btnClass: "btn-blue",
                action: function(){
                    $.ajax({
                        url: _route,
                        headers: { 'X-CSRF-TOKEN': _token },
                        type: 'POST',
                        data: _data
                    })
                    .done(function(data){
                        if(data.result == true){

                            // $("#championships").trigger("change", function(){});
                            $table = Game.getBootstrapTable();
                            $table.bootstrapTable('remove', {
                                field: 'id',
                                values: [parseInt(data.id)]
                            });

                            $.alert({
                                title: 'Informacion!',
                                content: 'Juego eliminado correctamente!',
                                type: 'dark',
                                typeAnimated: true,
                                columnClass: "col-md-6",
                            });

                        }else{
                            $.alert({
                                title: 'Informacion!',
                                content: 'Hubo un error en el proceso de eliminacion!',
                                type: 'red',
                                typeAnimated: true,
                                columnClass: "col-md-6",
                            });
                            
                        }
                    })
                    .fail(function(jqXHR, textStatus, errorThrown ){   
                        console.log(jqXHR.responseJSON.errors);
                        $.alert({
                            title: 'Informacion!',
                            content: 'Hubo un error en el proceso de eliminacion!',
                            type: 'red',
                            typeAnimated: true,
                            columnClass: "col-md-6",
                        });
                    })
                    .complete(function(jqXHR, textStatus ){
                    })
                }
            },
            cancel: {
                text: "No"
            }
        }
    })
};


