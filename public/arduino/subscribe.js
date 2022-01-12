const mqtt = require('mqtt')

var client = mqtt.connect('mqtt://broker.hivemq.com');

client.on('connect', function() {
    client.subscribe('node_topic');
    console.log("Ulandi");

});


client.on('message', function(topic, message) {
    console.log(topic, message.toString());
});
