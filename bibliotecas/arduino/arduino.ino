#include <WiFi.h>
#include <HTTPClient.h>
#include <Wire.h>

#ifdef __cplusplus
  extern "C" {
 #endif

  uint8_t temprature_sens_read();

#ifdef __cplusplus
}
#endif

uint8_t temprature_sens_read();

const char ssid[] = "linksys"; //Nome da rede  IFC: linksys
const char password[] = "123456789"; //Senha da rede IFC: 123456789

String HOST_NAME = "http://192.168.1.100"; // Troque para o ip da sua máquina  'pc ifc: 192.168.1.100'
String PHP_FILE_NAME   = "/teste/teste.php";  //Troque para o nome do seu arquivo php

const int MPU = 0x68; //Endereço do MPU6050
int16_t AcX, AcY, AcZ, GyX, GyY, GyZ; //Variáveis para armazenar os dados do MPU6050

void setup() { 
  Wire.begin(); //Inicia a comunicação I2C
  Wire.beginTransmission(MPU); //Inicia a comunicação com o MPU6050
  Wire.write(0x6B); //Seleciona o registrador PWR_MGMT_1
  Wire.write(0); //Escreve 0 no registrador selecionado acima
  Wire.endTransmission(1); //Encerra a comunicação com o MPU6050

  // Configura Giroscópio para fundo de escala desejado
  /*
    Wire.write(0b00000000); // fundo de escala em +/-250°/s
    Wire.write(0b00001000); // fundo de escala em +/-500°/s
    Wire.write(0b00010000); // fundo de escala em +/-1000°/s
    Wire.write(0b00011000); // fundo de escala em +/-2000°/s
  */
  
  Wire.beginTransmission(MPU);
  Wire.write(0x1B);
  Wire.write(0x00011000);
  Wire.endTransmission(1);
  
  // Configura Acelerometro para fundo de escala desejado
  /*
      Wire.write(0b00000000); // fundo de escala em +/-2g
      Wire.write(0b00001000); // fundo de escala em +/-4g
      Wire.write(0b00010000); // fundo de escala em +/-8g
      Wire.write(0b00011000); // fundo de escala em +/-16g
  */
  
  Wire.beginTransmission(MPU);
  Wire.write(0x1C);
  Wire.write(0x00011000);
  Wire.endTransmission(1);

  Serial.begin(115200); //Inicia a comunicação serial
   
  WiFi.begin(ssid, password); //Conecta na rede
  Serial.print("Conectando na rede WiFi"); 
  while(WiFi.status() != WL_CONNECTED) { //Aguarda a conexão
    delay(500); 
    Serial.print("."); 
  } 

  Serial.println("");
  Serial.print("Conectado ao ip: "); //Exibe mensagem de conexão
  Serial.println(WiFi.localIP()); //Exibe o ip obtido
  
}

void loop() {
  Wire.beginTransmission(MPU); //Inicia a comunicação com o MPU6050
  Wire.write(0X3B); //Seleciona o registrador ACCEL_XOUT_H
  Wire.endTransmission(0); //Encerra a comunicação com o MPU6050
  Wire.requestFrom(MPU, 14 , 1); //Solicita os dados de 14 registradores começando no registrador selecionado acima
  AcX = Wire.read()<<8|Wire.read(); //Armazena os dados do registrador ACCEL_XOUT_H em AcX
  AcY = Wire.read()<<8|Wire.read(); //Armazena os dados do registrador ACCEL_YOUT_H em AcY
  AcZ = Wire.read()<<8|Wire.read(); //Armazena os dados do registrador ACCEL_ZOUT_H em AcZ
  GyX = Wire.read()<<8|Wire.read(); //Armazena os dados do registrador GYRO_XOUT_H em GyX
  GyY = Wire.read()<<8|Wire.read(); //Armazena os dados do registrador GYRO_YOUT_H em GyY
  GyZ = Wire.read()<<8|Wire.read(); //Armazena os dados do registrador GYRO_ZOUT_H em GyZ

  Serial.print("Query da temperatura: "); //Exibe mensagem de temperatura
  double temperature = (temprature_sens_read() - 32) / 1.8;   // Convete a temperatura para graus Celsius
  
  String tempQuery = "?temperature="; //Cria a string para armazenar a temperatura
  tempQuery.concat(temperature); //Concatena a temperatura na string tempQuery

  Serial.println(tempQuery);

  Serial.print("Query do acelerometro: "); //Exibe mensagem do acelerometro

  String aceleracaoQuery = "&acx="; //Cria a string para armazenar a aceleração
  aceleracaoQuery.concat(AcX / 2048); //Concatena a aceleração do eixo X na string aceleracaoQuery
  aceleracaoQuery.concat("&acy="); //Concatena a aceleração do eixo Y na string aceleracaoQuery 
  aceleracaoQuery.concat(AcY / 2048); //Concatena a aceleração do eixo Y na string aceleracaoQuery
    aceleracaoQuery.concat("&acz="); //Concatena a aceleração do eixo Z na string aceleracaoQuery 
  aceleracaoQuery.concat(AcZ / 2048); //Concatena a aceleração do eixo Z na string aceleracaoQuery

  Serial.println(aceleracaoQuery);
  
  Serial.print("Query do giro: "); //Exibe mensagem do giro

  String giroQuery = "&gyx="; //Cria a string para armazenar a aceleração
  giroQuery.concat(GyX / 16.4); //Concatena a aceleração do eixo X na string aceleracaoQuery
  giroQuery.concat("&gyy="); //Concatena a aceleração do eixo X na string aceleracaoQuery
  giroQuery.concat(GyY / 16.4); //Concatena a aceleração do eixo Y na string aceleracaoQuery
  giroQuery.concat("&gyz="); //Concatena a aceleração do eixo Z na string aceleracaoQuery
  giroQuery.concat(GyZ / 16.4); //Concatena a aceleração do eixo Z na string aceleracaoQuery

  Serial.println(giroQuery);

  String url = HOST_NAME + PHP_FILE_NAME + tempQuery + aceleracaoQuery + giroQuery; //Concatena a url completa
  
  Serial.print("URL: "); //Exibe mensagem de url
  Serial.println(url); //Exibe a url completa

/*
  Serial.println(tempQuery);
  Serial.print("Aceleração eixo X = "); Serial.println(AcX);
  Serial.print("Aceleração eixo Y = "); Serial.println(AcY);
  Serial.println(" ");
  Serial.print("Giro eixo X = "); Serial.println(GyX);
  Serial.print("Giro eixo Y = "); Serial.println(GyY);
*/

  delay(1000);
  
  HTTPClient http; //Cria um objeto http
  String server = url; //Concatena o ip da máquina, o nome do arquivo php e a temperatura
  http.begin(server);  //Inicia a comunicação com o servidor
  int httpCode = http.GET(); //Envia os dados para o servidor

  if(httpCode > 0) { 
    if(httpCode == HTTP_CODE_OK) { //Verifica se o código de resposta é 200
      String payload = http.getString(); //Armazena a resposta do servidor na string payload
      Serial.println(payload); //Exibe a resposta do servidor
    } else { //Caso o código de resposta não seja 200
      Serial.printf("HTTP GET... código: %d\n", httpCode); //Exibe o código de resposta
    }
  } else { //Caso não haja resposta do servidor
    Serial.printf("HTTP GET... falhou, erro: %s\n", http.errorToString(httpCode).c_str()); //Exibe o erro
  }

  http.end();
  
}