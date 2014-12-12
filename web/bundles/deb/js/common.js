$(function () {
    
    $("#AuthForm").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "Reset": function() {
                $("#AuthForm").find('#email').val("");
                $('#password').val("");
            },
            "Submit": function() {

                var check_result = UserModule.CheckAuthFields(password_length);

                if(check_result){

                    var password = MD5($('#password').val());

                    Socket.emit('Authorization', {'Email': $("#AuthForm").find('#email').val(), 'Password': password});
                }
            },
            "Close": function() {
                $( this ).dialog( "close" );
            }
        }
    });
           
    $('#LoginBtn').click(function(ev){
        $("#AuthForm").dialog("open");
    });
    
    $("#LoginBtn").button();
    $("#RegisterBtn").button();
});
