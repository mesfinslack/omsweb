<?php

require 'PHPMailer-master/PHPMailerAutoload.php';

$data = json_decode(file_get_contents("php://input"));


//$data = [];
$userid='';
$username='';
$usertype='';
$response = [];
$sql="";


$servername = "localhost";
$serverusername = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $serverusername, $password, $dbname);


if ($data->usertype =='Admin'){
$sql = "SELECT * from admin  WHERE username = '$data->username' or phone = '$data->phone'  and email = '$data->email'";
}
if ($data->usertype =='Agency'){
$sql = "SELECT * from agencies where username = '$data->username' or phone = '$data->phone'  and email = '$data->email'";
}
if ($data->usertype =='Customer'){
$sql = "SELECT * from customer where username = '$data->username' or phone = '$data->phone'  and email = '$data->email'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

 $data2 = array() ;
    while($row = $result->fetch_assoc()) {
        $data2[] = $row;
    }



$listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$confirmation = substr(str_shuffle($listAlpha), 5, 8);    //substr(word,start,length)



$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "balimesfin@gmail.com";   //"phptutorial03@gmail.com";
  $mail->Password = "dukemesfinduke3"; //  "admin@12345";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "balimesfin@gmail.com";   //"phptutorial03@gmail.com";
  $mail->FromName = "mesfin";// "jignesh";
  
  $mail->addAddress($data->email);
  
  $mail->isHTML(true);
 
  $mail->Subject = "Forgot password confirmation number";
  $mail->Body = "<i><a href='http://localhost/OMSWEB/client/#/forgetpassword2' >go to page</a> Hi ". $data->email." this is your confirmation:</i>".$confirmation;
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";

$sql1 = "INSERT into  forgetpassword (tousertype,toemail,tousername,tophone, confirmation) values('$data->usertype','$data->email','$data->username','$data->phone', '$confirmation')";
$qry = $conn->query($sql1);

   $data2["status"]="sent";

  }

} else {
   $data2["status"]="notsent";
 }
echo json_encode($data2);
$conn->close();

?>