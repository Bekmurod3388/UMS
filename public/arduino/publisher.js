const mqtt = require('mqtt')

/* MQTT */
const host = 'broker.hivemq.com' || 'broker.emqx.io'
const port = 1883

const connectUrl = `mqtt://${host}:${port}`
const client = mqtt.connect(connectUrl)

const topic = 'node_topic'
client.on('connect', () => {
    setInterval(() => {
        client.publish(topic, "Yana bir", { qos: 0, retain: false }, function(error) {
            if (error)
                console.error(error)
        })

        console.log("Ketdi")
    }, 1000)
})
