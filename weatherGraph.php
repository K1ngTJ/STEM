
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$servername = "192.168.0.214";
$username = "humid";
$password = "password";
$dbname = "humidity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM temperatureData";
$highTemp =" SELECT * FROM temperatureData ORDER BY temperature DESC LIMIT 1";

$result2 = $conn->query($highTemp);
while($row = $result2->fetch_assoc()) {
        echo "The Highest Temp is : ". $row["temperature"]." ".DATE_FORMAT($row["dateTime"],"%M %d %Y")."<br></br>";
  
    } 
$result2->close();

$lowTemp =" SELECT * FROM temperatureData ORDER BY temperature ASC LIMIT 1";

$result3 = $conn->query($lowTemp);
while($row = $result3->fetch_assoc()) {
        echo "The Lowest Temp is : ". $row["temperature"]." ".$row["dateTime"]."<br></br>";
  
    } 

$result3->close();

$highHumidty =" SELECT * FROM temperatureData ORDER BY humidity DESC LIMIT 1";

$result4 = $conn->query($highHumidty);
while($row = $result4->fetch_assoc()) {
        echo "The Highest humidity is : ". $row["humidity"]." ".$row["dateTime"]."<br></br>";
  
    } 
$result4->close();

$lowHumidity =" SELECT * FROM temperatureData ORDER BY humidity ASC LIMIT 1";

$result5 = $conn->query($lowHumidity);
while($row = $result5->fetch_assoc()) {
        echo "The Lowest Humidity is : ". $row["humidity"]." ".$row["dateTime"]."<br></br>";
  
    } 

$result5->close();


//execute query
$result = $conn->query($query);
$humidity = "";
$temperature = "";
$dateTime = "";
//loop through the returned data
//fetch_assoc is an array that stores thing
 while($row = $result->fetch_assoc()) {
        //echo "name: " . $row["name"]. " - gradeLevel: " . $row["gradeLevel"]. "age: " . $row["age"]. "<br><br>";
        $humidity = $humidity.",".$row["humidity"];
        $dateTime = $dateTime.",".$row["dateTime"];
        $temperature = $temperature.",".$row["temperature"];

    } 

$result->close();

?>

<head>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<meta charset="utf-8">
<title></title>
</head>
<body>

<div id="chart">
</div>
<script>
var options = {
series: [
{
name: "Humidity",
data: [<?php echo substr($humidity, 1);?>]
},
{
name: "Temperature",
data: [<?php echo substr($temperature, 1);?>]
}
],
chart: {
height: 350,
type: 'line',
dropShadow: {
enabled: true,
color: '#000',
top: 18,
left: 7,
blur: 10,
opacity: 0.2
},
toolbar: {
show: false
}
},
colors: ['#77B6EA', '#545454'],
dataLabels: {
enabled: true,
},
stroke: {
curve: 'smooth'
},
title: {
text: 'Average High & Low Temperature',
align: 'left'
},
grid: {
borderColor: '#e7e7e7',
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
markers: {
size: 1
},
xaxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
title: {
text: 'Date Time'
}
},
yaxis: {
title: {
text: 'Temperature'
},
min: 5,
max: 90
},
legend: {
position: 'top',
horizontalAlign: 'right',
floating: true,
offsetY: -25,
offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>
</body>
</html>

