

<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "school";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); }
echo "Connected successfully";
echo '<a href = "sqlLed.php">" Turn On "</a>';
$sql = "UPDATE Lights SET MyLight = 0  ";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo "Changed Successfully";
}else{
	echo " ERROR: " . $sql . "<br>" . $conn->error;
}
echo"<br>";


?> 
