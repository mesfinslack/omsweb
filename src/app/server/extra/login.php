<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM customer WHERE username = '$data->username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
     $data = array() ;
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
echo json_encode($data);
$conn->close();










/*

session_start();

$status="fuck u";
$record = array();
$response =[];
$data = json_decode(file_get_contents("php://input"));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

echo json_encode($data);     
$password = $data->password;
$usertype = $data->usertype;
$username = $data->username;

$query = "SELECT * FROM customer WHERE userName='$username' AND password='$password'";
$result = $conn->query($query);

if($result->num_rows > 0) {
       // output data of each row

    while($row = $result->fetch_assoc()) {
        $record[] = $row;
    }

	$response['status'] = 'loggedin';
	$response['user'] = $username;
	$response['usertype'] = $usertype;
	$response['id'] = $record->id;
	//$response['id'] = md5(uniqid());
	$_SESSION['id'] = $response['id'];
	$_SESSION['user'] = $username;
	$_SESSION['usertype'] = $usertype;

} else {
	$response['status'] = 'error';
	$status='notloggedin';
}

echo json_encode($record);
$conn->close();    
*/ 
?> 