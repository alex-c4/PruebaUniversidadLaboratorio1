$("#form_purchase_plan").on("submit", function(){

    $.confirm({
        title: "Información",
        content: "Por favor confirmar el envío de la información.",
        type: "dark",
        columnClass: "col-md-6",
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: "Si",
                btnClass: "btn-blue",
                action: function(){
                    document.getElementById("form_purchase_plan").submit()
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