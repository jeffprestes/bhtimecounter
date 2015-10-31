/*
  Stage light controller for Battlehack
 */

int incomingByte = 0;
String cmd = "O";
char c;
char matriz[2];


// the setup function runs once when you press reset or power the board
void setup() {
  // initialize serial communication at 9600 bits per second:
  Serial.begin(9600);
  // initialize digital pin 13 as an output.
  pinMode(13, OUTPUT);

  // turn the LED on (HIGH is the voltage level)  
  digitalWrite(13, LOW);   
}

// the loop function runs over and over again forever
void loop() {

  if (Serial.available() > 0)   {
    //Only subscribe the command when a valid command is received
    String temp = readData();

    if (temp == "G" || temp == "Y" || temp == "R" || temp == "O" || temp == "Q")   {
      if (temp == "Q")  { 
        Serial.print("Actual command [" + cmd + "]\n");
      } else  {
        if (cmd != temp)  {
          cmd = temp;
        }
      }
    }
  }

  //Green = Presentation is happening
  if (cmd == "G")   {
    digitalWrite(13, HIGH);   // turn the LED on (HIGH is the voltage level)
    delay(100);

  //Yellow = Presentation time is about to finish
  } else if (cmd == "Y")  {
    digitalWrite(13, HIGH);   // turn the LED on (HIGH is the voltage level)      
    delay(400);
    digitalWrite(13, LOW);   // turn the LED on (HIGH is the voltage level)  
    delay(400);
  
  //Red = Presentation time is up
  } else if (cmd == "R")  {
    digitalWrite(13, HIGH);   // turn the LED on (HIGH is the voltage level)      
    delay(100);
    digitalWrite(13, LOW);   // turn the LED on (HIGH is the voltage level)  
    delay(100);

  //Off = No presentation is happening
  } else if (cmd == "O")  {
    digitalWrite(13, LOW);   // turn the LED on (HIGH is the voltage level)  
  } 

}



//Le as informacoes enviadas pela Serial
String readData()      {

    String retorno;

    do  {
        // read the incoming byte:
        c = Serial.read();
        matriz[incomingByte] = c;
        incomingByte++;
        delay(2);

        // statement block
    } while (Serial.available());

    matriz[incomingByte-1] = '\0';
    retorno = matriz;
    char matriz[2] = {0};
    incomingByte = 0;

    return retorno;

}

