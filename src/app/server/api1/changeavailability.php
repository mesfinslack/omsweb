<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE agencies SET availability ='$data->availability' WHERE id = $data->id ";
$result = $conn->query($sql);
$conn->close();
?>