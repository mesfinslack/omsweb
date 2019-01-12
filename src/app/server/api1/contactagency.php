<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($data->user=="loggedin"){
$sql = "INSERT INTO contactagency (toagencyid,fromuserid,fromusername,fromusertype,fromphone,message) VALUES ('$data->agencyid','$data->userid','$data->username', '$data->usertype','$data->phone','$data->message')";
$qry = $conn->query($sql);
if($qry){
	echo "contact us sent";
}
else{
	echo "contact us not  sent";
}
}



elseif ($data->user=="notloggedin") {
$sql1 = "INSERT INTO contactagency (toagencyid,fromusername, fromusertype, fromemail, fromphone, message) VALUES ('$data->agencyid','$data->name', 'unregistered', '$data->email',  '$data->phone','$data->message')";
$qry1 = $conn->query($sql1);
if($qry1){
	echo "contact us sent";
}
else{
	echo "contact us not  sent";
}
}

$conn->close();
?>



