<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$res="";
$response="";


$sql2 = "UPDATE maids SET availability ='yes' WHERE id = $data->mid ";
 $re1= $conn->query($sql2);

$sql3 = "DELETE from assignedmaid WHERE maidid = $data->mid ";
 $re2=$conn->query($sql3);

 if($re1){

$response="deleted";

 }
 else {
$response="notdeleted";
 }

echo json_encode($response);
$conn->close();
?>