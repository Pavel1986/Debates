$(function () {
            
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
                   
    $('#RegisterBtn').click(function(ev){
        $("#RegForm").dialog("open");
    });
        
    $("#RegisterBtn").button();
});
