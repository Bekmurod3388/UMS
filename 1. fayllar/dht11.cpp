#include "dht.h"
#define dht_apin A0 // Analog Pin sensor is connected to

dht DHT;

/* Asosiy parametrlar */
int serial_port = 9600;

void setup() {
  Serial.begin(serial_port);
  delay(500); // Delay to let system boot
  Serial.println("DHT11 ishga tushdi (namlik, harorat)\n\n");
  delay(1000); // Ishni boshlash uchun kutish vaqti
}//end "setup()"

void loop() {
   // Dasturning ishchi qismi

    DHT.read11(dht_apin);

    // Sensor
    Serial.print("{\"senosor_name\": DHT11");
    Serial.print(", ");

    // Parametres
    Serial.print("\"serial_port\": ");
    Serial.print(serial_port);
    Serial.print(", ");

    // Sensor values
    Serial.print("\"humidity\": ");
    Serial.print(DHT.humidity);
    Serial.print(", "); // %
    Serial.print("\"temperature\": ");
    Serial.print(DHT.temperature);
    Serial.println("}"); // C

    delay(1000); // 5 soniyadan takrorlanadi.
}
