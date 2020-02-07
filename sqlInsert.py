
import MySQLdb

db = MySQLdb.connect(host="localhost", user="user", passwd="password",db="school")
cur = db.cursor(MySQLdb.cursors.DictCursor)

sql = "INSERT INTO students (name, age,gradeLevel) VALUES (%s, %s, %s)"
val = ("TJ", "17","12")

db.commit()
cur.close
db.close
