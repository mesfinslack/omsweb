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

if ($data->type=="Advert") {

	$sql3 = "INSERT INTO advert (adverttitle,advertbody,advertreferencelink,picture,usertype,username,userid) VALUES ('$data->title','$data->body','$data->link','$data->image1','$data->usertype','$data->username','$data->userid')";

	$result3 = $conn->query($sql3);

	   $response["status"]="Advert is succussfull uploaded";
	}

else{

	$sql = "INSERT INTO news (newstitle,newsbody,newsreferencelink,picture,usertype,username,userid) VALUES ('$data->title','$data->body','$data->link','$data->image1','$data->usertype','$data->username','$data->userid')";

	$result = $conn->query($sql);
	   $response["status"]="News is succussfull uploaded";
}

echo json_encode($response);


$conn->close();
?>