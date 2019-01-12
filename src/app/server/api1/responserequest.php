<?php 

require '../PHPMailer-master/PHPMailerAutoload.php';
 $data = json_decode(file_get_contents("php://input"));


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);



if($data->response=="rejected"){
$sql = "UPDATE agencyrequest SET verificationcode ='' , response ='$data->response' WHERE id = $data->id ";
$result = $conn->query($sql);
if($result){

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
 
  $mail->Subject = "your request as agency is rejected";
  $mail->Body = "<i><a href='http://localhost/OMSWEB/client/#/' >go to page</a> Hi '$data->email' your request as agency is rejected, please try again or contact us on this link</i> <div>http://localhost/OMSWEB/client/#/</div>";
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "rejected successfully";
  }
  }
	}


if($data->response=="accepted"){

$listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$verificationcode = substr(str_shuffle($listAlpha), 5, 8);    //substr(word,start,length)


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
 
  $mail->Subject = "your request as agency is accepted";
  $mail->Body = "<i><a href='http://localhost/OMSWEB/client/#/' >go to page</a> Hi 'data->email' this is your confirmation:</i>".$verificationcode;
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
	$sql3 = "UPDATE agencyrequest SET response ='$data->response', verificationcode = '$verificationcode' WHERE id = '$data->id' ";
	$result3 = $conn->query($sql3);
   echo "Message has been sent successfully";
  }


}


$conn->close();

?>