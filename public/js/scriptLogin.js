$("#btnLogin").click(function(){
    var _email = $("#inputEmail").val();
    var _password = $("#inputPassword").val();
    var _route = $("#routeCurrent").val();
    var _token = $("#token").val();

    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        dataType: 'json',
        data: {
            email: _email,
            password: _password
        }
    })
    .done(function(data, textStatus, jqXHR){
            console.log(data);
        })
    .fail(function(jqXHR, textStatus, errorThrown ){
            console.log(jqXHR.responseJSON.errors);

            if(jqXHR.responseJSON.errors.hasOwnProperty( 'email' )){
                console.log(jqXHR.responseJSON.errors.email[0])
            }
            if(jqXHR.responseJSON.errors.hasOwnProperty( 'password' )){
                console.log(jqXHR.responseJSON.errors.password[0])
            }
        })

    // console.log("Route" + )
    
});

// funcion AJAX para la busqueda de los estados mediante un ID
$('#country_id').on('change', function(){
    var _route = $("#routeCurrent").val();
    var country_id = $(this).val();
    var _url = _route + '/api/state/' + country_id;

    $.get(_url)
    .done(function(data, textStatus, jqXHR){
        var html_select = '<option selected>...</option>';

        for(var i = 0; i < data.length; i++){
            html_select += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
        }
        $('#state_id').html(html_select);
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        console.log(jqXHR.responseJSON.errors);
    });
});

// funcion AJAX para la busqueda de las Ciudades mediante un ID
$('#state_id').on('change', function(){
    var _route = $("#routeCurrent").val();
    var state_id = $(this).val();
    var _url = _route + '/api/city/' + state_id;

    $.get(_url)
    .done(function(data, textStatus, jqXHR){
        var html_select = '<option selected>...</option>';

        for(var i = 0; i < data.length; i++){
            html_select += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
        }
        $('#city_id').html(html_select);
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        console.log(jqXHR.responseJSON.errors);
    });
});
