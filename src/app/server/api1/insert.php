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
$Ustatus="";
$Pstatus="";

$sql4= "SELECT * FROM agencyrequest where  verificationcode = '$data->verificationcode' ";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {

$maid=[];
$sql1= "SELECT * FROM agencies where  username = '$data->username' ";
$sql2= "SELECT * FROM agencies where  email = '$data->email' ";
$sql3= "SELECT * FROM agencies where  password = '$data->password' ";
$sql5= "SELECT * FROM agencies where  phone = '$data->phone' ";

	$result1 = $conn->query($sql1);
	$result2 = $conn->query($sql2);
	$result3 = $conn->query($sql3);
//	$result4 = $conn->query($sql4);
	$result5 = $conn->query($sql5);

if ($result1->num_rows > 0) {$error['username']="THE USERNAME '$data->username' is already taken try another";  $Ustatus= "error"; } 
if ($result2->num_rows > 0) {$error['email']="THE EMAIL '$data->email' is already taken try another"; echo "email";} 
if ($result3->num_rows > 0) {$error['password']="THE PASSWORD '$data->password' is already taken try another"; $Pstatus= "error";} 
if ($result5->num_rows > 0) {$error['phone']="THE PHONE '$data->phone' is already taken try another"; echo "phone";} 


if($error){

		if($Ustatus){   $status="The username you entered is already taken by other user try different"; }
		if($Pstatus){  $status="The Password you entered is already taken by other user try different"; }
		if(($Ustatus)&&($Pstatus)){  $status="The username and Password you entered is already taken by other user try different";}
		$error['status']="error";

		echo json_encode($error);
		$conn->close();
}

else{

	$insert = "INSERT INTO agencies (name, username,phone,phone2,fax,email,website,region,zone,town, password,description) 
VALUES ('$data->name','$data->username', '$data->phone','$data->phone2', '$data->fax','$data->email','$data->website','$data->region','$data->zone','$data->town', '$data->password','$data->description')";

		$insertqry = $conn->query($insert);
		if($insertqry){

		$selectsql = "SELECT * from agencies  WHERE username ='$data->username' and password = '$data->password'";
			$selectresult = $conn->query($selectsql);
			if ($selectresult->num_rows > 0) {
			    while($row = $selectresult->fetch_assoc()) {
			        $response['id']  = $row["id"];
			        $response['username']  = $row["username"];
			        $response['usertype'] = $row["usertype"];
			    } 
			
		    }
		    $response['status'] ="registered";
		}
		 else {
		   $response['status'] ="not registered";
		   $status="not registered";
			}


$conn->close();
echo json_encode($response);
}
}// if verification end
else{
  $response['status'] ="verification code is not found";
$error['verificationcode']="THE PHONE '$data->verificationcode' verification code is not found"; echo "verification error";
}



?>