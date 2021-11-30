var http = require('http');
var fs = require('fs');
var index = fs.readFileSync('index1.html');

var SerialPort = require('serialport');
const parsers = SerialPort.parsers;

const parser = new parsers.Readline({
    delimiter: '\r\n'
});

var port = new SerialPort('COM4', {
    baudRate: 9600,
    dataBits: 8,
    parity: 'none',
    stopBits: 1,
    flowControl: false
});

port.pipe(parser);

var app = http.createServer(function(req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end(index);
});

/* FrontEnd side */
var io = require('socket.io').listen(app);

io.on('connection', function(socket) {
    console.log('Socket ulandi');
});

parser.on('data', function(data) {
    console.log('Ko\'rsatkichlar: ' + data);
    io.emit('msg', data);
});

app.listen(5000);
