var socket = new WebSocket('ws://10.11.7.8:5353');

socket.onopen = function(event) {
    var msg = 'I am the client.';

    console.log('> ' + msg);

    // Send an initial message
    socket.send(msg);

    // Listen for messages
    socket.onmessage = function(event) {
        console.log('< ' + event.data);
    };

    // Listen for socket closes
    socket.onclose = function(event) {
        console.log('Client notified socket has closed', event);
    };

    // To close the socket....
    //socket.close()

};