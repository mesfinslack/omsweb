<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE maids SET imagefront1 ='$data->image1', imageside2 ='$data->image2', imageside3 ='$data->image3' WHERE id = $data->mid ";

$qry = $conn->query($sql);

if($qry)
	{
		echo "uploaded successfully";
	}
else
	{
		echo "uploading not successful";
	}

$conn->close();
?>