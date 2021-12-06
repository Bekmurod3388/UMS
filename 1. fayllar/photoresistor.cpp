/* Use a photoresistor (or photocell) to turn on an LED in the dark
   More info and circuit schematic: http://www.ardumotive.com/how-to-use-a-photoresistor-en.html
   Dev: Michalis Vasilakis // Date: 8/6/2015 // www.ardumotive.com */


// Constants
const int pResistor = A0; // Photoresistor at Arduino analog pin A0
const int ledPin=9;       // Led pin at Arduino pin 9

// Variables
int value;          // Store value from photoresistor (0-1023)
int serial_port = 9600;

void setup(){
  Serial.begin(serial_port); // Ma'lumot uzatish uchun
  pinMode(ledPin, OUTPUT);  // Set lepPin - 9 pin as an output
  pinMode(pResistor, INPUT); // Set pResistor - A0 pin as an input (optional)
}

void loop(){
  value = analogRead(pResistor);

  if (value > 50){
    digitalWrite(ledPin, LOW);  //Turn led off
  } else{
    digitalWrite(ledPin, HIGH); //Turn led on
  }

  Serial.print("{\"sensor_name\": \"photoresistor\", ");
  Serial.print("\"serial_port\": ");
  Serial.print(serial_port);
  Serial.print(", ");
  Serial.print("\"light\": ");
  Serial.print(value);
  Serial.println("}");

  delay(500); //Small delay
}
