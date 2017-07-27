var express = require("express"),
    app = require("express")(),
    http = require("http").Server(app),
    io = require("socket.io")(http),
    util = require("util"),
    fs = require("fs");

var server_user = []; 
var clients = []; 
var group_leader = [];
http.listen(4545, function() {
    console.log("Connected to :4545");
});

app.use(express.static(__dirname));
app.get("/", function(req, res) {
    res.sendfile(__irname + "/index.html");
});

io.sockets.on("connection", function(socket) {
    io.emit("user_connection", socket.id);

    io.emit("server_user", server_user);
    
    socket.on("create_user", function(data_user) {
        server_user.push(data_user);
        io.emit("create_user", data_user); //
    });

    socket.on("message", function(data_message) {
        io.emit("message", data_message);
    })
    socket.on("disconnect", function() {
        var i = 0;
        for (var i = 0; i < server_user.length; i++) {
            if (server_user[i].id == socket.id) {
                server_user.splice(i, 1); 
            }
        }
        io.emit("user_disconnect", socket.id);
       
    });
   
    socket.on("create_room", function(room_id) {
        io.sockets.connected[socket.id].join(room_id);
        group_leader[room_id] = socket.id;
    });
    socket.on("invite_room", function(id, room_id) {
        io.sockets.connected[id].emit("invite_room", id, room_id);
    });
    socket.on("status_invited_room", function(id, room_id, status) {
        if (status == 1) {
            io.sockets.connected[id].join(room_id);
        }
    });
    socket.on("event_room", function(room_id, message_type, event_room) {
        if (group_leader[room_id] == socket.id) {
            if (message_type == "travel") {
                socket.in(room_id).emit("event_room", getUserRoom(room_id), message_type, event_room);
                io.sockets.connected[socket.id].emit("event_room", getUserRoom(room_id), message_type, event_room);
                console.log("working cool");
            } else if (message_type == "bounds" || message_type == "streetview") {
                socket.in(room_id).emit("event_room", '', message_type, event_room);
            }
        }
    });
    socket.on("room_message", function(room_id, data_message) {
        socket.in(room_id).emit("room_message", data_message);
        io.sockets.connected[socket.id].emit("room_message", data_message);
    })
});

function getUserRoom(room_id) {
    var user = [];
    for (var key in io.sockets.adapter.rooms[room_id]) {
        if (io.sockets.adapter.rooms[room_id][key] == true) {
            user.push(key);
        }
    }
    return user;
}
