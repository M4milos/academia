//Incluindo as bibliotecas
#include <DNSServer.h>
#include <Arduino.h>
#include <WiFi.h>
#include <AsyncTCP.h>
#include <ESPAsyncWebServer.h>
#include <Adafruit_MPU6050.h>
#include <Adafruit_Sensor.h>
#include <Arduino_JSON.h>
#include "SPIFFS.h"

//Informações da internet pra depois fazer conexão STA obs: inútil por enquanto
char* ssid = "";
char* password = "";

//Config dos Servidores
DNSServer dnsServer;
const byte DNS_PORT = 53;
//Endereço IP http://192.168.1.1
IPAddress apIP(192, 168, 1, 1);
AsyncWebServer server(80);
AsyncEventSource events("/events");

JSONVar readings;

//Variáveis de tempo e delay
//Zeros
unsigned long zeroGyro = 0;
unsigned long zeroTemp = 0;
unsigned long zeroAcc = 0;
unsigned long zeroTimer = 0;

//Delay em milissegundos
unsigned long delayGyro = 10;
unsigned long delayTemp = 1000;
unsigned long delayAcc = 250;
unsigned long delayTimer = 100;

//Config do sensor
Adafruit_MPU6050 mpu;

sensors_event_t a, g, temp;

//Varíaveis usadas

//Dados do Gyro
float gyroX, gyroY, gyroZ;

//Dados do Acc
float accX, accY, accZ, accA, totalaccA, accAA;
#define sizeofaccv 30
float accv[sizeofaccv];

int i;
//Pelo amor né
int numEx = 0;
int numExVa = 0;
int numExVo = 0;
int numExT = 0;
int acumul = 0;
int acumulV = 0;

//Dados Timer
int timerMili = 0;
int timerSeg = 0;
int timerMin = 0;
int timerHora = 0;

//10% de ctz que é dos botões
int estTempo = 0;
int estEx = 0;
int salvTempo = 0;
int salvEx = 0;


//Dados Temp
float temperature;








//Calibrar o Gyro mas nem uso mais por motivos de gambiarra
float gyroXerror = 0.03;
float gyroYerror = 0.03;
float gyroZerror = 0.03;








//Startar o MPU6050
void initMPU() {
  if (!mpu.begin()) {
    Serial.println("Failed to find MPU6050 chip");
    while (1) {
      delay(10);
    }
  }
  Serial.println("MPU6050 Found!");
}

//Startar o SPIFFS
void initSPIFFS() {
  if (!SPIFFS.begin()) {
    Serial.println("An error has occurred while mounting SPIFFS");
  }
  Serial.println("SPIFFS mounted successfully");
}







//Startar o WiFi
void initConexao() {
  //Criar Acess Point
  WiFi.mode(WIFI_AP);
  //Config
  WiFi.softAPConfig(apIP, apIP, IPAddress(255, 255, 255, 0));
  //Nome e Senha do Acess Point
  WiFi.softAP("Contabilizador de Exercícios", "87654321");

//WiFi.mode(WIFI_STA);
//  WiFi.begin(ssid, password);
//  Serial.println("");
//  Serial.print("Connecting to WiFi...");
//  while (WiFi.status() != WL_CONNECTED) {
//    Serial.print(".");
//    delay(1000);
//  }
//  Serial.println("");
//  Serial.println(WiFi.localIP());
}









String getGyroReadings() {
  //Pegando info do sensor
  mpu.getEvent(&a, &g, &temp);

  //Contas e talz
  float gyroX_temp = (g.gyro.x - 0.26);
  if (abs(gyroX_temp) > gyroXerror)  {
    gyroX += gyroX_temp / 50.00;
  }

  float gyroY_temp = (g.gyro.y - 0.063);
  if (abs(gyroY_temp) > gyroYerror) {
    gyroY += gyroY_temp / 70.00;
  }

  float gyroZ_temp = (g.gyro.z + 0.007);
  if (abs(gyroZ_temp) > gyroZerror) {
    gyroZ += gyroZ_temp / 90.00;
  }

  //Salvando e enviando por JSON os valores do Gyro
  readings["gyroX"] = String(gyroX);
  readings["gyroY"] = String(gyroY);
  readings["gyroZ"] = String(gyroZ);
  String jsonString = JSON.stringify(readings);
  return jsonString;
}




String getAccReadings() {
  //Pegando info do sensor
  mpu.getEvent(&a, &g, &temp);

  //Pegando a velocidade e aplicando uma correção
  accX = a.acceleration.x;//-0.2;
  accY = a.acceleration.y;//+0.7;
  accZ = a.acceleration.z;//-1;
  accA = sqrt( (accX * accX) + (accY * accY) + (accZ * accZ) );

  if(estEx == 1){
    if(salvEx == 1){
      numEx = 0;
      numExT = 0;
      numExVa = 0;
      numExVo = 0;
      acumul = 0;
      acumulV = 0;
      salvEx = 0;
    }
  float totalaccA = accA - accAA;
  if (totalaccA>3.5 or totalaccA<-3.5){
      acumul = 1;
  }else if(totalaccA<3.5 and totalaccA>-3.5 and acumul == 1){
      acumulV++;
      if(acumulV % 2 == 0){
        numExVa++;
      }else{
        numExVo++;
        numExT++;
      }
      numEx++;
      acumul = 0;
  }
  accAA = accA;
  }else{
    salvEx = 1;
  }

  //Salvando e enviando por JSON os valores do Acc
  readings["totalaccA"] = String(totalaccA);
  readings["accX"] = String(accX);
  readings["accY"] = String(accY);
  readings["accZ"] = String(accZ);
  readings["accA"] = String(accA);
  readings["numEx"] = String(numEx);
  readings["numExVa"] = String(numExVa);
  readings["numExVo"] = String(numExVo);
  readings["numExT"] = String(numExT);
  String accString = JSON.stringify (readings);
  return accString;
}

String getTemperature() {
  //Pegando info do sensor
  mpu.getEvent(&a, &g, &temp);

  //enviando por JSON o valor da temp obs: nn precisa de reading pq é só um
  temperature = temp.temperature;
  return String(temperature);
}

String getTime() {
  //Pegando info do sensor mas nem to usando ele WTFKKK
  mpu.getEvent(&a, &g, &temp);

  //Contagem do tempo
  if (estTempo == 1) {
    if(salvTempo == 1){
      timerMili = 0;
      timerSeg = 0;
      timerMin = 0;
      salvTempo = 0;
    }
    timerMili = timerMili + 10;
    if (timerMili >= 100) {
      timerSeg = timerSeg + 1;
      timerMili = 0;
    }
    if (timerSeg >= 60) {
      timerMin = timerMin + 1;
      timerSeg = 0;
    }
  }
  //Resetando
  else {
    salvTempo = 1;
  }

  //Salvando e enviando por JSON os valores do Timer
  readings["timerMili"] = String(timerMili);
  readings["timerSeg"] = String(timerSeg);
  readings["timerMin"] = String(timerMin);
  String timeString = JSON.stringify (readings);
  return timeString;
}






void setup() {
  //Serialzada neles
  Serial.begin(115200);

  //Chamando os outros setup
 // initConexao();
 // initSPIFFS();
  initMPU();

//  //Handle Web Server
//  //Basicamente pega os valor que a página envia
//  server.on("/", HTTP_GET, [](AsyncWebServerRequest * request) {
//    request->send(SPIFFS, "/index.html", "text/html");
//  });
//
//  //Botão Reset Num
//  server.on("/resetNum", HTTP_GET, [](AsyncWebServerRequest * request) {
//    numEx = 0;
//    acumul = 0;
//    numExVa = 0;
//    numExVo = 0;
//    acumulV = 0;
//    numExT = 0;
//    request->send(200, "text/plain", "OK");
//  });
//
//
//  //Iniciar Timer
//  server.on("/initTempor", HTTP_GET, [](AsyncWebServerRequest * request) {
//    if (estTempo == 0) {
//      estTempo = 1;
//    } else {
//      estTempo = 0;
//    }
//    request->send(200, "text/plain", "OK");
//  });
//
//    //Iniciar Tudo
//  server.on("/initAll", HTTP_GET, [](AsyncWebServerRequest * request) {
//    if (estTempo == 0) {
//      estTempo = 1;
//    } else {
//      estTempo = 0;
//    }
//    if (estEx == 0) {
//      estEx = 1;
//    } else {
//      estEx = 0;
//    }
//    request->send(200, "text/plain", "OK");
//  });
//
//  server.serveStatic("/", SPIFFS, "/");
//


  // Handle Web Server Events
//  events.onConnect([](AsyncEventSourceClient * client) {
//    if (client->lastId()) {
//      Serial.printf("Client reconnected! Last message ID that it got is: %u\n", client->lastId());
//    }
//    // send event with message "hello!", id current millis
//    // and set reconnect delay to 1 second
//    client->send("hello!", NULL, millis(), 10000);
//  });
//  server.addHandler(&events);
//
//  server.begin();
}






void loop() {
  //Confi do servidor DNS
//  dnsServer.processNextRequest();
   getAccReadings(); 
   delay(10);
  //Código dos delays
  int Subindo = 0;
  int Descendo = 0;
 //roda vetor
  for(int x = 0; x < sizeofaccv; x++){
   if(accv[sizeofaccv-x] * 1.05 < accv[sizeofaccv-1-x]){
      Subindo++;
   }else if(accv[sizeofaccv-x] * 1.5 > accv[sizeofaccv-1-x]){
      Descendo++;
   }
   accv[sizeofaccv-x] = accv[sizeofaccv-1-x]; 
   
  // Serial.print(accv[x]);
   // Serial.print(sizeofaccv-1-x);
   // Serial.print("/");
  }
  accv[0] = accA;
 accA = 0;
 //média
 for(int x = 0; x < sizeofaccv; x++){
   accA += accv[x];
   
  }
  
  accA = accA / sizeofaccv;
 Serial.print(accA);
 Serial.println("");
//  if(Subindo > sizeofaccv/4){
//    Serial.println(1);
//  }else if(Subindo < sizeofaccv/2){
//    Serial.println(-1);
//  }else{
//    Serial.println(0);
//  }
// 
  //Delay Gyro
//  if ((millis() - zeroGyro) > delayGyro) {
//    // Send Events to the Web Server with the Sensor Readings
//    events.send(getGyroReadings().c_str(), "gyro_readings", millis());
//    zeroGyro = millis();
//  }
//
//  //Delay Temp
//  if ((millis() - zeroTemp) > delayTemp) {
//    // Send Events to the Web Server with the Sensor Readings
//    events.send(getTemperature().c_str(), "temperature_reading", millis());
//    zeroTemp = millis();
//  }
//
//  //Delay Acc
//  if ((millis() - zeroAcc) > delayAcc) {
//    // Send Events to the Web Server with the Sensor Readings
//    events.send(getAccReadings().c_str(), "accelerometer_readings", millis());
//    zeroAcc = millis();
//  }
//
//  //Delay Timer
//  if ((millis() - zeroTimer) > delayTimer) {
//    // Send Events to the Web Server with the Sensor Readings
//    events.send(getTime().c_str(), "timer_readings", millis());
//    zeroTimer = millis();
//  }
}