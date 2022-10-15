const mqtt = require('mqtt')

/* MQTT */
const host = 'broker.hivemq.com' || 'broker.emqx.io'
const port = 1883

const connectUrl = `mqtt://${host}:${port}`
const client = mqtt.connect(connectUrl)

const topic = 'node_topic'

function send(data) {
    client.publish(topic, data, { qos: 0, retain: false }, function(error) {
    })
    // client.on('connect', () => {
//     setInterval(() => {
//
//         console.log("Ketdi")
//     }, 1000)
// })
}

module.exports = {
    topic, send
}
