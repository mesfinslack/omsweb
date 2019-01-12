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
$status="";


$customer=[];

$sql1= "SELECT * FROM customer where  username = '$data->username' ";
$sql11= "SELECT * FROM customer where  username = '$data->username'  and id = '$data->id' ";
$sql2= "SELECT * FROM customer where  email = '$data->email'   ";
$sql22= "SELECT * FROM customer where  email = '$data->email' and id = '$data->id'";
$sql5= "SELECT * FROM customer where  phone = '$data->phone' ";
$sql55= "SELECT * FROM customer where  phone = '$data->phone'  and id = '$data->id' ";

	$result1 = $conn->query($sql1);
	$result11 = $conn->query($sql11);
	$result2 = $conn->query($sql2);
	$result22 = $conn->query($sql22);
	$result5 = $conn->query($sql5);
	$result55 = $conn->query($sql55);

if ($result1->num_rows > 0) {
	if (!($result11->num_rows > 0)) {
	$error['username']="THE USERNAME '$data->username' is already taken try another";  $Ustatus= "error"; 
} 
} 

if ($result2->num_rows > 0) {
	if (!($result22->num_rows > 0)) {
		$error['email']="THE EMAIL '$data->email' is already taken try another";$Estatus= "error";
} 
} 

if ($result5->num_rows > 0) {
	if (!($result55->num_rows > 0)) {
	$error['phone']="THE PHONE '$data->phone' is already taken try another";$P2status= "error";
} 
} 

if($error){

		if($Estatus){  $status="The email you entered is already taken by other user try different"; }
		if($P2status){  $status="The phone you entered is already taken by other user try different"; }
		if($Ustatus){  $status="The username you entered is already taken by other user try different"; }
		if(($Estatus)&&($P2status)){  $status="The email and phone you entered is already taken by other user try different";}
		$error['status']=$status;

		echo json_encode($error);
		$conn->close();
}

else{
	$UPDATE = "UPDATE customer set fname='$data->fname',lname='$data->lname',sex='$data->sex', username='$data->username',phone='$data->phone',email='$data->email',region='$data->region',zone='$data->zone',town='$data->town' where id =$data->id";


		$insertqry = $conn->query($UPDATE);
		if($insertqry){

		$selectsql = "SELECT * from customer  WHERE username ='$data->username' and id = '$data->id'";
			$selectresult = $conn->query($selectsql);
			if ($selectresult->num_rows > 0) {
			    while($row = $selectresult->fetch_assoc()) {
			        $response['id']  = $row["id"];
			        $response['username']  = $row["username"];
			        $response['usertype'] = $row["usertype"];
			    } 
			
		    }
		    $response['status'] ="updated";
		}
		 else {
		   $response['status'] ="not updated";
		
			}


$conn->close();
echo json_encode($response);
}



?>