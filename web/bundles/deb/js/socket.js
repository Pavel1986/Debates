$(function() {
    
    if(socket){    
        socket.on('message', function (message) {
            $("#MessagesList").append(new Date().toLocaleString() + ' ' +message + "<br />");
        });
        
        socket.on('messages_list', function (data) {
            $.each(data.messages, function(index, message) {
                                
                $("#MessagesList").append(new Date(message.date_created).toLocaleString() + ' ' + message.message + "<br />");
                
            });
        });
    }
});