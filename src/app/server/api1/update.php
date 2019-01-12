<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE agencies SET 
name ='$data->name',username='$data->username', phone ='$data->phone', phone2 ='$data->phone2',fax ='$data->fax',region='$data->region',zone='$data->zone', town ='$data->town',
email ='$data->email', license ='$data->license', website='$data->website',
password ='$data->password',description ='$data->description' WHERE id = $data->id ";

$qry = $conn->query($sql);
$conn->close();
?>