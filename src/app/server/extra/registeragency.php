<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omsdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO agency (name,username,password,phone,description,phone2,license,start,email,fax,website,region,zone,town)
 VALUES ('$data->name', '$data->username', '$data->password', '$data->phone','$data->description','$data->phone2','$data->license','$data->start','$data->email','$data->fax','$data->website','$data->region','$data->zone','$data->town')";
$qry = $conn->query($sql);
$conn->close();
?>