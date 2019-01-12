<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omsdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "UPDATE agency SET 
ability='true', WHERE id = $data->id ";

$qry = $conn->query($sql);
$conn->close();

?>