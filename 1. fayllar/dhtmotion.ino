#include "dht.h"
#define dht_apin A0 // Analog Pin sensor is connected to

dht DHT;
int pirSensor = 8;
int relayInput = 13;
int motion = 0;
/* Asosiy parametrlar */
int serial_port = 9600;

void setup() {
    pinMode(pirSensor,INPUT);
    pinMode(relayInput, OUTPUT);
    Serial.begin(serial_port);
    delay(500); // Delay to let system boot
    Serial.println("DHT11 ishga tushdi (namlik, harorat)\n\n");
    delay(1000); // Ishni boshlash uchun kutish vaqti

}

void loop() {
    // Dasturning ishchi qismi
  int sensorValue = digitalRead(pirSensor);

    DHT.read11(dht_apin);

    // Sensor
    Serial.print("{\"sensor_name\": \"DHT11\"");
    Serial.print(", ");

    // Parameters
    Serial.print("\"serial_port\": ");
    Serial.print(serial_port);
    Serial.print(", ");

    // Sensor values
    if(sensorValue == 1)
  {
    motion = 1;
    digitalWrite(relayInput, HIGH);
    Serial.print("\"motion\": ");
    Serial.print(motion);
  }
  else{
    motion = 0;
    digitalWrite(relayInput, LOW);
    Serial.print("\"motion\": ");
    Serial.print(motion);
  }

    Serial.print("\"humidity\": ");
    Serial.print(DHT.humidity);
    Serial.print(", "); // %
    Serial.print("\"temperature\": ");
    Serial.print(DHT.temperature);
    Serial.println("}"); // C

    delay(3000); // 5 soniyadan takrorlanadi.
}
