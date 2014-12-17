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
    
    $("#RegForm").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "Reset": function() {
                $("#RegForm").find('#email').val("");
                $('#password_first').val("");
                $('#password_second').val("");
                $('#name').val("");
            },
            "Create": function() {

                var check_result = UserModule.CheckRegFields(name_length, password_length);

                if(check_result){

                    var password = MD5($('#password_first').val());

                    Socket.emit('Registration', {'Email' : $("#RegForm").find('#email').val(), 'Password' : password, 'Name' : $('#name').val()});

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
    
    $('#RegisterBtn').click(function(ev){
        $("#RegForm").dialog("open");
    });
    
    $("#LoginBtn").button();
    $("#RegisterBtn").button();
});
