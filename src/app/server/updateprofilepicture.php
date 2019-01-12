<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$res="";
$response = array() ;

$table= $data->usertype;
if($table=="customer"){
	$table="customer";
}
elseif($table=="admin"){
	$table="admin";
	
}
else{
	$table="agencies";
}


$sql = "UPDATE $table  set picture='$data->image1' where id=$data->userid   ";
	$result = $conn->query($sql);
if($result){
	   $response["status"]="picture is succussfull uploaded";
}else{
	   $response["status"]="error";	
}

echo json_encode($response);
$conn->close();
?>