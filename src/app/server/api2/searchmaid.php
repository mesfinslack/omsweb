<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM maids WHERE educationlevel = '$data->educationlevel'"; 

/*AND expectedsallary = '$data->expectedsallary' AND martualstatus = '$data->martualstatus' AND language1 = '$data->language1' AND religion = '$data->religion' AND region = '$data->region' AND zone = '$data->zone' AND town = '$data->town'
*/

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
     $data = array() ;
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
echo json_encode($data);
$conn->close();
?>