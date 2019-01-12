<?php 

$data = json_decode(file_get_contents("php://input"));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$error=[];
$response=[];
$p2="";
$p1="";
$status="";
$customer=[];



$table= $data->usertype;
if($table=="customer"){
	$table="customer";
}

elseif ($table=="admin") {
	$table="admin";
}
else{
	$table="agencies";
}






$sql1= "SELECT * FROM $table where id = '$data->id' and password = '$data->oldpass'";
$result1 = $conn->query($sql1);


$sql2= "SELECT * FROM $table where  password = '$data->newpass' ";
$result2 = $conn->query($sql2);

if (!($result1->num_rows > 0)) {$error['password1']="Your OLD PASSWORD is not Correct";  $p1= "error"; } 

if ($result2->num_rows > 0) {$error['password2']="Try other NEW PASSWORD ";  $p2= "error"; } 



if($error){

		if($p2){  $status=$error['password2']; }
		if($p1){  $status=$error['password1']; }
		if(($p1)&&($p2)){  $status="Your OLD PASSWORD is not Correct and Try other NEW PASSWORD ";}

		if(($data->newpass)!=($data->newpass2)){  $status="re-entered password not match";}

		$error['status']=$status;

		echo json_encode($error);
		$conn->close();
}

else{
	$UPDATE = "UPDATE $table set password= '$data->newpass' where id ='$data->id'";
	$insertqry = $conn->query($UPDATE);
		if($insertqry){
		    $response['status'] ="updated";
		}
		 else {
		   $response['status'] ="not updated";
			}


$conn->close();
echo json_encode($response);
}



?>