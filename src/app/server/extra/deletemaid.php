<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omsdb";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM maid WHERE id = $data->id";
$result = $conn->query($sql);
$conn->close();
?>