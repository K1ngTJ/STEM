
import pymysql
import RPi.GPIO as GPIO
x=1
while x == 1:
	
# Open database connection
	db = pymysql.connect("localhost","user","password","school" )

# prepare a cursor object using cursor() method
	cursor = db.cursor()




	cursor.execute("SELECT * FROM Lights")

	myresult = cursor.fetchall()

	if myresult[0] == (1,):
		GPIO.setmode(GPIO.BCM)
		GPIO.setwarnings(False)
		GPIO.setup(26,GPIO.OUT)
		print ("LED on")
		GPIO.output(26,GPIO.HIGH)
	
	else:
		GPIO.setmode(GPIO.BCM)
		GPIO.setwarnings(False)
		GPIO.setup(26,GPIO.OUT)
		print ("LED off")
		GPIO.output(26,GPIO.LOW)


print(myresult)
print(type(myresult[0]))
