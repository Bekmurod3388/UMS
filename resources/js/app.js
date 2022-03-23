const mqtt = require('mqtt')
const client = mqtt.connect('mqtt://broker.hivemq.com');

client.on('connect', function() {
    client.subscribe('node_topic');
    console.log("Ulandi");
});

client.on('message', function(topic, message) {
    let data = message.toString();
    console.log(data);
});
