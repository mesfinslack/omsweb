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

$sql4= "SELECT * FROM agencies where  email = '$data->email' or phone = '$data->phone' ";
$result4 = $conn->query($sql4);

$sql= "SELECT * FROM agencyrequest where  agencyemail = '$data->email' or agencyphone = '$data->phone' ";
$result = $conn->query($sql);
	
	if (($result->num_rows > 0)||($result4->num_rows > 0)) {
	    $response["status"]="someone already requested with this email or phone, please try with different";
	}
else{

	$sql3 = "INSERT INTO agencyrequest (agencyname,agencyphone,agencyemail,document) VALUES ('$data->aname','$data->phone','$data->email','$data->image1')";

	$result3 = $conn->query($sql3);
	if ($result3) {
	   $response["status"]="successfully requseted,/n wait some time we will send you verification code to your email if you pass validations ";
	   
	} else {
	   $response["status"]="Not successfully requested";
	   $response["status"]="successfully requseted,/n wait some time we will send you verification code to your email if you pass validations ";
	}
}

echo json_encode($response);


$conn->close();
?>