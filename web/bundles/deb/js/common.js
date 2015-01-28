$(function () {    
    $("._submit").button();
    $("._reset").button();
    $("._close").button();
});

var MainModule = {};
MainModule.ShowAlertWindow = function(InfoData, reload){

    $('#dialog-message').remove();

    var ui_state_class;
    if(InfoData.MessageType === "Error"){
        ui_state_class = "ui-state-error";
    }else{
        ui_state_class = "ui-state-highlight";
    }

    $('body').append('<div id="dialog-message"><div class="' + ui_state_class + '"><ul id="InfoMessageList"></ul></div>');

    if(typeof(InfoData.MessageContent) == 'object'){
        for (var InfoMessage in InfoData.MessageContent)
        {
            $("#InfoMessageList").append('<li>' + InfoData.MessageContent[InfoMessage] + '</li>');
        }
    }else{
        $("#InfoMessageList").append('<li>' + InfoData.MessageContent + '</li>');
    }

    var dialog_options = { autoOpen: false, modal: true, buttons: {
        Ok: function() {
            if(reload == true){
                window.location = window.location.href;
            }
            $( this ).dialog( "close" );
        }
    }};
    if(typeof(InfoData.MessageType) !== 'undefined'){


        dialog_options.title = "<img style='position: relative; top: 4px; height: 20px; margin-right: 10px' src='/images/info_messages/" + InfoData.MessageType + ".png'>" + InfoData.MessageTitle;

    }else if(typeof(InfoData.MessageTitle) !== 'undefined'){

    }

    $("#dialog-message").dialog(dialog_options);
    $('#dialog-message').dialog('open');
};