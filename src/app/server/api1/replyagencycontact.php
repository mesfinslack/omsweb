<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE contactagency SET  reply ='$data->reply', replied='yes' WHERE id = $data->id ";

$qry = $conn->query($sql);
$conn->close();
?>