$(function() {
    
    if(socket){    
        socket.on('message', function (message) {
            $("#MessagesList").prepend(new Date().toLocaleString() + ' ' +message + "<br />");
        });
        
        socket.on('messages_list', function (data) {
            $.each(data.messages, function(index, message) {
                                
                $("#MessagesList").prepend(new Date(message.date_created).toLocaleString() + ' ' + message.message + "<br />");
                
            });
        });
        socket.on('TopicStartedAuthor', function () {
            alert('TopicStarted. To author only.');
        });
        socket.on('TopicStarted', function () {
            alert('TopicStarted. In room.');
        });
        
    }
});