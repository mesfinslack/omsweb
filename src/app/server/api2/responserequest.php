<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$data = json_decode(file_get_contents("php://input"));

$hi = $data->id;
$res="";

$conn = new mysqli($servername, $username, $password, $dbname);

//$sql = "UPDATE maidrequest SET respond ='$data->respond' WHERE id = $data->id ";

//$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$res="good";
} 
else{
	$res="not good";
}
$conn->close();


echo json_encode($hi);
?>