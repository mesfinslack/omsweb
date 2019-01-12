<?php

$data = [];
$userid='';
$username='';
$usertype='';
$response = [];
$sql="";

$data = json_decode(file_get_contents("php://input"));

$servername = "localhost";
$serverusername = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $serverusername, $password, $dbname);


 
if ($data->usertype =='Admin'){
$sql = "SELECT * from admin  WHERE username = '$data->username' and password = '$data->password'";
}
if ($data->usertype =='Agency'){
$sql = "SELECT * from agencies  WHERE username ='$data->username' and password = '$data->password'";
}
if ($data->usertype =='Customer'){
$sql = "SELECT * from customer  WHERE username = '$data->username' and password = '$data->password'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $userid = $row["id"];
        $username = $row["username"];
        $usertype = $row["usertype"];
    } 

	$response['id'] =    $userid ;
	$response['username'] = $username ;
	$response['usertype'] = $usertype;
	$response['status'] = 'loggedin';
    $status="loggedin";

} else {
   $status="notloggedin";
   $response['status'] = 'notloggedin';
}
echo json_encode($response);
$conn->close();

?>