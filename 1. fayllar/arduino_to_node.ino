int percent = 0;
int prevPercent = 0;
int serialPort = 9600;

void setup() {
    Serial.begin(serialPort);
}

void loop() {
    percent = round(analogRead(0) / 1024.00 * 100);

    if (percent != prevPercent) {
        Serial.println(percent);
        prevPercent = percent;
    }

    delay(100);
}
