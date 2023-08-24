#include <Wire.h>
#include <DHT.h>
#include <LiquidCrystal_I2C.h>
#include <ESP8266WiFi.h>

#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

const char* ssid     = "esp8266";
const char* password = "1234567890";
const char *serverName = "http://192.168.43.1/ta-cici/api/sensor/save";
WiFiServer server(80);

String header;

String output5State = "off";
LiquidCrystal_I2C lcd(0x27, 16, 2);

// Assign output variables to GPIO pins
const int output5 = D5;
const int relay = D6;
const int moisturePin = A0;

// DHT SENSOR
const int DHTPin = D3;
const int DHTType = DHT11;
DHT dht(DHTPin, DHTType);


// Current time
unsigned long currentTime = millis();
// Previous time
unsigned long previousTime = 0; 
// Define timeout time in milliseconds (example: 2000ms = 2s)
const long timeoutTime = 2000;

void setup() {

  Serial.begin(115200);
  dht.begin();
  pinMode(output5, OUTPUT);
  pinMode(relay, OUTPUT);


  digitalWrite(output5, LOW); 
  digitalWrite(relay, LOW);

  // Connect to Wi-Fi network with SSID and password
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);


  // LCD KONTROLLER ===============
  // SPLASH SCREEN
   int nilai_kelembaban = analogRead(moisturePin);
  lcd.setCursor(1, 0);
  lcd.init();
  lcd.backlight();
  lcd.print("System Loading");
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(500);
  }
  lcd.clear();


// PROSES CEK SSID
  lcd.init();
  lcd.backlight();
  lcd.setCursor(0, 1);
  lcd.print("Connect To : ");
  lcd.setCursor(1, 1);
  lcd.print(ssid);
  lcd.clear();

  // END LCD CONTROLLER ===========
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
     
    Serial.print(" . ");
    Serial.print("");
  }
  // Print local IP address and start web server
  Serial.println("");
  Serial.println("WiFi connected.");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  server.begin();


// MENCARI IP
  lcd.init();
  lcd.backlight();
  lcd.print("Mencari IP :");
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(500);
  }
  lcd.clear();


// MENAMPILKAN IP WIFI
  lcd.init();
  lcd.backlight();
  lcd.print(WiFi.localIP());
  server.begin();
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(500);
  }
  lcd.clear();


}

void loop(){
  int moistureValue = analogRead(moisturePin); // Read the soil moisture value

  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();

  // Cek apakah pembacaan sukses
  if (isnan(temperature) || isnan(humidity)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  // Tampilkan nilai suhu dan kelembaban di Serial Monitor
  Serial.print("Temperature: ");
  Serial.print(temperature);
  Serial.print(" °C\t");
  Serial.print("Humidity: ");
  Serial.print(humidity);
  Serial.println(" %");

  // Tunggu selama 2 detik sebelum membaca data kembali
  delay(2000);
String ip;
if(moistureValue < 600){
  Serial.print("Moisture: ");
  Serial.println(moistureValue);
  digitalWrite(relay, HIGH);

  lcd.init();
  lcd.backlight();
  lcd.print("KT : ");
  lcd.print(moistureValue);
  lcd.setCursor(0, 1);
  lcd.print("Temp: ");
  lcd.print(temperature);
  lcd.print(" C");
}else{
  Serial.print("Moisture: ");
  Serial.println(moistureValue);
  digitalWrite(relay, LOW);
  lcd.init();
  lcd.backlight();
  lcd.print("KT : ");
  lcd.print(moistureValue);
  lcd.setCursor(0, 1);
  lcd.print("Temp: ");
  lcd.print(temperature);
  lcd.print(" C");

  Serial.println(WiFi.localIP());
  server.begin();
  
}
delay(2000);
  
 

  // ======================================
  WiFiClient client = server.available();   // Listen for incoming clients

  // PROSES STORE DATA=======================
   if (WiFi.status() == WL_CONNECTED)
    {
        WiFiClient client;
        HTTPClient http;

        String 
        r1, r2, r3,r4,ip;

  r1 = String(moistureValue);
  r2 = String(temperature);
  r3 = String(humidity);


        http.begin(client, serverName);

        http.addHeader("Content-Type", "application/x-www-form-urlencoded");


        String httpRequestData = "moistureValue="+r1 
                              +"&temperature="+r2 
                              +"&humidity="+r3;

        Serial.print("httpRequestData: ");
        Serial.println(httpRequestData);

        int httpResponseCode = http.POST(httpRequestData);

        if (httpResponseCode > 0)
        {
            Serial.print("HTTP Response code: ");
            Serial.println(httpResponseCode);
        }
        else
        {
            Serial.print("Error code: ");
            Serial.println(httpResponseCode);
        }
        http.end();


  delay(2000);

    }
    // END STORE DATA =======================================


  if (client) {                             // If a new client connects,
    Serial.println("New Client.");          // print a message out in the serial port
    String currentLine = "";                // make a String to hold incoming data from the client
    currentTime = millis();
    previousTime = currentTime;
    while (client.connected() && currentTime - previousTime <= timeoutTime) { // loop while the client's connected
      currentTime = millis();         
      if (client.available()) {             // if there's bytes to read from the client,
        char c = client.read();             // read a byte, then
        Serial.write(c);                    // print it out the serial monitor
        header += c;
        if (c == '\n') {                    // if the byte is a newline character
          // if the current line is blank, you got two newline characters in a row.
          // that's the end of the client HTTP request, so send a response:
          if (currentLine.length() == 0) {
            // HTTP headers always start with a response code (e.g. HTTP/1.1 200 OK)
            // and a content-type so the client knows what's coming, then a blank line:
            client.println("HTTP/1.1 200 OK");
            client.println("Content-type:text/html");
            client.println("Connection: close");
            client.println();
            
            // turns the GPIOs on and off
            if (header.indexOf("GET /5/on") >= 0) {
              Serial.println("GPIO 5 on");
              output5State = "on";
              digitalWrite(output5, HIGH);
            } else if (header.indexOf("GET /5/off") >= 0) {
              Serial.println("GPIO 5 off");
              output5State = "off";
              digitalWrite(output5, LOW);
            } 
            
            // Display the HTML web page
            client.println("<!DOCTYPE html><html>");
            client.println("<head><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">");
            client.println("<link rel=\"icon\" href=\"data:,\">");
            // CSS to style the on/off buttons 
            // Feel free to change the background-color and font-size attributes to fit your preferences
            client.println("<style>html { font-family: Helvetica; display: inline-block; margin: 0px auto; text-align: center;}");
            client.println(".button { background-color: #195B6A; border: none; width:100%; height: 300px color: white; padding: 16px 40px;");
            client.println("text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer;}");
            client.println(".button2 {background-color: #77878A;}</style></head>");
            
            // Web Page Heading
            
            // If the output5State is off, it displays the ON button       
            if (output5State=="off") {
              client.println("<p><a href=\"/5/on\"><button class=\"button\">ON</button></a></p>");
            } else {
              client.println("<p><a href=\"/5/off\"><button class=\"button button2\">OFF</button></a></p>");
            } 
       
            client.println("</body></html>");
            
            // The HTTP response ends with another blank line
            client.println();
            // Break out of the while loop
            break;
          } else { // if you got a newline, then clear currentLine
            currentLine = "";
          }
        } else if (c != '\r') {  // if you got anything else but a carriage return character,
          currentLine += c;      // add it to the end of the currentLine
        }
      }
    }
    // Clear the header variable
    header = "";
    // Close the connection
    client.stop();
    Serial.println("Client disconnected.");
    Serial.println("");
    
    
  }
}