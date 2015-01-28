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
        socket.on('TopicStartedAuthor', function (data) {
            MainModule.ShowAlertWindow({ message : "TopicStarted. To author only.", title : "Topic started", force2redirect : true, redirect_link : "/detail/" + data.topic_id });
        });
        socket.on('TopicStarted', function (data) {
            MainModule.ShowAlertWindow({ message : "TopicStarted. To room.", title : "Topic started", force2redirect : true, redirect_link : "/detail/" + data.topic_id });
        });
        
    }
});