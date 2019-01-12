<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM $data->tablename WHERE id = '$data->id' ";
$result = $conn->query($sql);
if($result){ 
	echo "'$data->tablename' with id '$data->id '  successfully deleted";
}
else{
	echo "'$data->tablename' with id '$data->id ' not deleted";
}
$conn->close();
?>