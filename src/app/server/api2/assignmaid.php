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


$sql = "INSERT INTO assignedmaid (maidid,maidname,customerid,customername,maidagencyid, maidagencyname,commision) VALUES ('$data->maidid','$data->maidname','$data->customerid','$data->customername','$data->maidagencyid', '$data->maidagencyname', '$data->commision' )";
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	   $response="successfully assigned";
	   
	} else {
	   $response="Not successfully assigned";
	}

$sql2 = "UPDATE maids SET availability ='no' WHERE id = $data->maidid ";
 $conn->query($sql2);

$sql3 = "DELETE from maidrequest WHERE id = $data->id ";
 $conn->query($sql3);

echo json_encode($response);
$conn->close();
?>