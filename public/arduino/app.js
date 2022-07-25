var SerialPort = require('serialport');
var http = require('http');
var fs = require('fs');

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


/* Client data send */
let app = http.createServer(function(req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end(index);
});

/* FrontEnd side */
const io = require('socket.io').listen(app);

io.on('connection', function(socket) {
    console.log('Socket ulandi');
});

parser.on('data', function(data) {
    console.log('Ko\'rsatkichlar: ' + data);
    io.emit('msg', data);
});

// app.listen(5000);
