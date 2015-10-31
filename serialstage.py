import serial
import sys

ser = serial.Serial('/dev/tty.usbmodem1411', 9600)
if ser.isOpen() is False:	
	ser.open()

comando = sys.argv[1] + " "
ser.write(comando.encode())
ser.close()


