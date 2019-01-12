<?php 

require '../PHPMailer-master/PHPMailerAutoload.php';

$data = json_decode(file_get_contents("php://input"));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE maidrequest SET respond ='$data->respond' WHERE id = $data->id ";

$result = $conn->query($sql);
if ($result) {


$sql1 = "Select * from customer where id = $data->customerid";

$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $email = $row["email"];
    }



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
  $mail->addAddress($email);
  $mail->isHTML(true); 
  $mail->Subject = "Maid Request Has Been ".$data->respond." in Etiopian Maid Service ";
  $mail->Body = "<i><a href='http://localhost/OMSWEB/client/#/' >go to page</a> Hi ".$data->customername." Your Request for ".$data->maidname." as Maid is  ". $data->respond." please contact us for more Information:<a href='http://localhost/OMSWEB/client/#'>Ethiopian Maid Service</a></i>";
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
  }
}
} 
else{
	$res="not good";
}

$conn->close();


//echo json_encode($hi);
?>