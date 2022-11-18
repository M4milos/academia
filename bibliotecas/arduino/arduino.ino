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

JSONVar readings;

//Config do sensor
Adafruit_MPU6050 mpu;

sensors_event_t a, g, temp;

//Varíaveis usadas

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

int estEx = 0;
int salvEx = 0;


//Dados Temp
float temperature;

//Contagem dos movimentos
int A=0;
int B=0;
int movimento=0;


//Startar o MPU6050
void initMPU() {
  if (!mpu.begin()) {
    Serial.println("Falha ao achar o módulo MPU6050");
    while (1) {
      delay(10);
    }
  }
  Serial.println("MPU6050 Achado!");
}

//Startar o SPIFFS
void initSPIFFS() {
  if (!SPIFFS.begin()) {
    Serial.println("Aconteceu um erro enquanto montava SPIFFS");
  }
  Serial.println("SPIFFS montado com sucesso");
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

  //Salvando os valores do Acc por JSON 
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

  temperature = temp.temperature;
  
  return String(temperature);
}

void setup() {
  //Inicia a Serial em 11520
  Serial.begin(115200);

  //Chama a função de iniciar o MPU
  initMPU();
}

void loop() {
   getAccReadings(); 
   delay(10);
   
 //roda vetor
  for(int x = 0; x < sizeofaccv; x++){
   accv[sizeofaccv-x] = accv[sizeofaccv-1-x]; 
  }
  accv[0] = accA;
 accA = 0;
 //média
 for(int x = 0; x < sizeofaccv; x++){
   accA += accv[x];
   
  }
  
  accA = accA / sizeofaccv;
 
  A=B;
  if(accA >13){
    B=1;
  }else{
    B=0;
  }
  if(B==1 && A==0){
    movimento++;
  }
  
 Serial.print(movimento);
 Serial.println("");
}
