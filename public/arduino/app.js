var SerialPort = require('serialport');
const publisher = require('../../public/arduino/publisher')
const express = require('express')
const app = express()
const cors = require('cors')
// app.use(cors())
const http = require('http')
const server = http.createServer(app)
// const { Server } = require('socket.io')
// const io = new Server(server)
const io = require('socket.io')(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
})
// app.use(cors())

var fs = require('fs');
var date;

var index = fs.readFileSync('index.html');

const parser = new SerialPort.parsers.Readline({
    delimiter: '\r\n'
});

const port_name = "/dev/tty.usbmodem1101"; //"COM4";
const port = new SerialPort(port_name, {
    baudRate: 9600,
    dataBits: 8,
    parity: 'none',
    stopBits: 1,
    flowControl: false
});
port.pipe(parser);

io.on('connection', function(socket) {
    console.log("Ulandi");
})

parser.on('data', function(data) {
    console.log('Ko\'rsatkichlar: ' + data);
    date = JSON.stringify(data);
    io.emit('data', data);
    publisher.send(data)
});

server.listen(3000);
