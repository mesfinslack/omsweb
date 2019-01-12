<?php

require 'PHPMailer-master/PHPMailerAutoload.php';

$data = json_decode(file_get_contents("php://input"));


//$data = [];
$userid='';
$username='';
$usertype='';
$response = [];
$sql="";

$error=[];
$response=[];
$p2="";
$p1="";
$status="";
$customer=[];



$servername = "localhost";
$serverusername = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $serverusername, $password, $dbname);


$sql = "SELECT * from forgetpassword  WHERE toemail = '$data->email' and tousertype = '$data->usertype'  and confirmation = '$data->confirmation'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

$table= $data->usertype;
if($table=="Customer"){
  $table="customer";
}
elseif ($table=="Admin") {
  $table="admin";
}
else{
  $table="agencies";
}
$sql2= "SELECT * FROM $table where  password = '$data->new2' ";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) 
{
    $error['status']="Try other NEW PASSWORD "; 

    echo json_encode($error);
    $conn->close();
}
else{
  $UPDATE = "UPDATE $table set password = '$data->new2' where email = '$data->email'";
  $insertqry = $conn->query($UPDATE);
    if($insertqry){
        $response['status'] ="your password changed login with new one";
    }
     else {
       $response['status'] ="password not changed";
      }
}
}
else 
{

$response['status']="You are not confirmed with this information";

}


echo json_encode($response);
$conn->close();

?>