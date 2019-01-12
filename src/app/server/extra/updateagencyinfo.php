<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omsdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "UPDATE maid SET 
name='$data->name',username ='$data->username', password='$data->password',phone ='$data->phone',description='$data->description',phone2='$data->phone2',license='$data->license',start='$data->start',email='$data->email',fax='$data->fax',website='$data->website',region='$data->region',zone='$data->zone',town='$data->town' WHERE id = $data->id ";

$qry = $conn->query($sql);
$conn->close();

?>