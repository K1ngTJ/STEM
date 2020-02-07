import MySQLdb

mydb = mysql.connector.connect(
  host="localhost",
  user="user",
  passwd="password",
  database="school"
)

mycursor = mydb.cursor()

sql = "UPDATE students SET name = 'TJ' WHERE gradeLevel = '12'"

mycursor.execute(sql)

mydb.commit()

print(mycursor.rowcount, "record(s) affected") 
