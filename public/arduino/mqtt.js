const SerialPort = require('serialport');
const mqtt = require('mqtt')

const parser = new SerialPort.parsers.Readline({
    delimiter: '\r\n'
});

const port_name = "/dev/cu.usbmodem1101"; //"COM4";
const serialPort = new SerialPort(port_name, {
    baudRate: 9600,
    dataBits: 8,
    parity: 'none',
    stopBits: 1,
    flowControl: false
});

serialPort.pipe(parser);
readAnalog(parser);

function readAnalog(parser) {
    parser.on('data', function(data) {
        console.log('Ko\'rsatkichlar: ' + data);
        Publish(client, data)
    });
}

/* MQTT */
const host = 'broker.hivemq.com'
const port = 1883

const connectUrl = `mqtt://${host}:${port}`
const client = mqtt.connect(connectUrl)

const topic = 'node_topic'
Connect(client);

function Connect(client) {
    client.on('connect', () => {})
}

function Publish(client, msg) {
    client.publish(topic, msg, { qos: 0, retain: false }, function(error) {
        if (error)
            console.error(error)
    })
}

// client.subscribe([topic], () => {
//
// });

// function Message(client) {
//     client.on('message', (topic, payload) => {
//         // console.log('Keldi:', topic, payload.toString())
//         console.log(payload.toString())
//     })
// }
// const clientId = 'mqtt_5b341673b181' //`mqtt_${Math.random().toString(16).slice(3)}`

// const opt = {
//     clientId,
//     clean: true,
//     connectTimeout: 4000,
//     username: 'emqx',
//     password: 'public',
//     reconnectPeriod: 1000
// }
