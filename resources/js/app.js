const mqtt = require('mqtt')
const client = mqtt.connect('mqtt://broker.hivemq.com');
const TempHumidity = require('./models/Test')

client.on('connect', function() {
    client.subscribe('node_topic');
    console.log("Ulandi");
});

client.on('message', function(topic, message) {
    let data = JSON.parse(message.toString());
    save(data);
});

async function save(data) {
    let {temperature, humidity} = data;
    let temp = new TempHumidity({
        temperature, humidity
    });

    await temp.save();
}
