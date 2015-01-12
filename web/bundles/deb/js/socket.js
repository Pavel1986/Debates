$(function() {
    socket.on('message', function (message) {
        $("#MessagesList").append(message + "<br />");
    });
});