var Utils ={
    AJAXMsgFail: "",
    AJAXMsgDone: "",
    percentage: 5.4,
    fee: 0.3,
    get_AJAXMsgFail: function(){
        return Utils.AJAXMsgFail
    },
    set_AJAXMsgFail: function(value){
        Utils.AJAXMsgFail = value;
    },
    get_AJAXMsgDone: function(){
        return Utils.AJAXMsgDone;
    },
    set_AJAXMsgDone: function(value){
        Utils.AJAXMsgDone = value;
    },
    get_percentage: function(){
        return Utils.percentage;
    },
    get_fee: function(value){
        return Utils.fee;
    },
    showAlert: function(msg){
        $.alert({
            title: 'Información!',
            content: msg,
            type: 'dark',
            typeAnimated: true,
            columnClass: "col-md-6",
        });
    },
    AJAXFunction: function(_url, _token, _data){
        return $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: _data
        })
        .done(function(data, textStatus, jqXHR){
            // if(data.result == true){
            //     debugger
            // }else{
            //     showAlert(this.get_AJAXMsgDone());
            // }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            Utils.showAlert(Utils.get_AJAXMsgFail());
        });
    },
    bootstrapAlert_show: function(idDiv, idAlert, msg){
        var _html = '<div class="alert alert-info" role="alert" id="' + idAlert + '">' +
                    '' + msg + '' +
                    '</div>';
        $('#' + idDiv).html(_html);
    },
    bootstrapAlert_close: function(idAlert){
        $('#' + idAlert).alert('close');
    },
    calcToAmountSent: function(amountSent){
        var percentage = Utils.get_percentage();
        var fee = Utils.get_fee();
    
        var getAmount = amountSent - (((percentage * amountSent) / 100) + fee);
        // totalfees = ((percentage * amountSent) / 100) + fee;
        sendAmount = Math.round(getAmount*100)/100;
    
        return sendAmount;
    }
}