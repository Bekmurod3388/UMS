const SerialPort = require('serialport');
const mqtt = require('mqtt')

const parser = new SerialPort.parsers.Readline({
    delimiter: '\r\n'
});

const port_name = "/dev/cu.usbmodem11101"; //"COM4";
const serialPort = new SerialPort(port_name, {
    baudRate: 9600,
    dataBits: 8,
    parity: 'none',
    stopBits: 1,
    flowControl: false
});

serialPort.pipe(parser);
// readAnalog(parser);

/* MQTT */
const host = 'broker.emqx.io'
const port = 1883
const clientId = 'mqtt_5b341673b181' //`mqtt_${Math.random().toString(16).slice(3)}`

const connectUrl = `mqtt://${host}:${port}`
const client = mqtt.connect(connectUrl, {
    clientId,
    clean: true,
    connectTimeout: 4000,
    // username: 'emqx',
    // password: 'public',
    reconnectPeriod: 1000
})

const topic = '/nodejs/mqtt'
Connect(client);
Message(client);

function Connect(client) {
    client.on('connect', () => {
        client.subscribe([topic], () => {
            console.log(`'${topic}' ga ulandi`)
        });
    })
}

function Publish(client) {
    client.publish(topic, 'NodeJS dan yubordim', { qos: 0, retain: false }, function(error) {
        if (error)
            console.error(error)

        // console.log("Ketdi")
    })
}

function Message(client) {
    client.on('message', (topic, payload) => {
        // console.log('Keldi:', topic, payload.toString())
        console.log(payload.toString())
    })
}


function readAnalog(parser) {
    parser.on('data', function(data) {
        console.log('Ko\'rsatkichlar: ' + data);

        Publish(client)
    });
}
