<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "school";
$conn = new mysqli($servername, $username, $password,$dbname);

/
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo '<a href = "sqlLed2.php">" Turn Off "</a>';

$sql = "UPDATE Lights SET MyLight = 1";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo "Changed Successfully";
}else{
	echo " ERROR: " . $sql . "<br>" . $conn->error;
	
}
echo "<br>";
print("LIGHT Off")
?> 
