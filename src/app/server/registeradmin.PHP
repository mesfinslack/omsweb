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
$status="";


$admin=[];

$sql1= "SELECT * FROM admin where  username = '$data->username' ";
$sql2= "SELECT * FROM admin where  email = '$data->email' ";
$sql3= "SELECT * FROM admin where  password = '$data->password' ";
$sql5= "SELECT * FROM admin where  phone = '$data->phone' ";
$sql6= "SELECT * FROM inviteadmin where  verificationcode = '$data->verificationcode' ";

	$result1 = $conn->query($sql1);
	$result2 = $conn->query($sql2);
	$result3 = $conn->query($sql3);
	$result5 = $conn->query($sql5);
	$result6 = $conn->query($sql6);

if ($result1->num_rows > 0) {$error['username']="THE USERNAME '$data->username' is already taken try another";  $Ustatus= "error"; } 
if ($result2->num_rows > 0) {$error['email']="THE EMAIL '$data->email' is already taken try another"; echo "email";$Estatus= "error";
} 
if ($result3->num_rows > 0) {$error['password']="THE PASSWORD '$data->password' is already taken try another"; $Pstatus= "error";} 
if ($result5->num_rows > 0) {$error['phone']="THE PHONE '$data->phone' is already taken try another"; echo "phone";$P2status= "error";
} 
if (!($result6->num_rows > 0)) {$error['verificationcode']="Your verification code is incorrect or expired"; echo "verificationcode";$Vstatus= "error";
} 

if($error){

		if($Estatus){  $status="The email you entered is already taken by other user try different"; }
		if($P2status){  $status="The phone you entered is already taken by other user try different"; }
		if($Ustatus){  $status="The username you entered is already taken by other user try different"; }
		if($Pstatus){  $status="The Password you entered is already taken by other user try different"; }
		if(($Ustatus)&&($Pstatus)){  $status="The username and Password you entered is already taken by other user try different";}
		if(($Estatus)&&($P2status)){  $status="The email and phone you entered is already taken by other user try different";}
		if($Vstatus){  $status="Your verification code is incorrect or expired"; }

		$error['status']=$status;

		echo json_encode($error);
		$conn->close();
}

else{
	$insert = "INSERT INTO admin (fname,lname,sex, username,phone,phone2,email,region,zone,town, password) 
VALUES ('$data->fname','$data->lname','$data->sex','$data->username', '$data->phone','$data->phone2','$data->email','$data->region','$data->zone','$data->town', '$data->password')";

		$insertqry = $conn->query($insert);
		if($insertqry){

		$selectsql = "SELECT * from admin  WHERE username ='$data->username' and password = '$data->password'";
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
		
			}


$conn->close();
echo json_encode($response);
}



?>