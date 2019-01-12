<?php

require 'PHPMailer-master/PHPMailerAutoload.php';

$data = json_decode(file_get_contents("php://input"));

$servername = "localhost";
$serverusername = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $serverusername, $password, $dbname);

 $response['status'] ="successfull";

if($data->table=="servicebyemail"){
$sql = "SELECT * from servicebyemail where name = '$data->name' and  email = '$data->email'";
$result = $conn->query($sql);
}

if($data->table=="inviteadmin"){
$sql = "SELECT * from inviteadmin  where email = '$data->email'";
$result = $conn->query($sql);

}


if (!($result->num_rows > 0)) {/// main if block

/*
if($data->table=="servicebyemail"){
$sql1 = "INSERT INTO servicebyemail (email,name ) VALUES ('$data->email','$data->name')";
$qry = $conn->query($sql1);
}

else if($data->table=="inviteadmin"){
$sql1 = "INSERT INTO inviteadmin (email,invitername,inviterid,verificationcode ) VALUES ('$data->email','$data->invitername','$data->inviterid','')";
$qry = $conn->query($sql1);
}

*/

/*if (!($qry->num_rows > 0)) {*/
 

$listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$verificationcode = substr(str_shuffle($listAlpha), 5, 15);    //substr(word,start,length)

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
  $mail->Username = "balimesfin@gmail.com"; 
  $mail->Password = "dukemesfinduke3"; 
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "balimesfin@gmail.com";  
  $mail->FromName = "mesfin";
  
  $mail->addAddress($data->email);
  
  $mail->isHTML(true);
  $mail->Subject = "ETHIOPIAN MAID SERVICE";
 
 if($data->table=="servicebyemail"){
  $mail->Body = "<i><a href='http://localhost/OMSWEB/client/#/' >GO TO OUR WEBSITE</a> HI OUR SERVICE CUSTOMER , WE ACCEPTED YOU SERVICE REQUEST AND WE WILL ALWAYS SEND YOU NEWS ABOUT MAID SERVICES IN ETHIOPIA THANKYOU!! </i>";

$sql1 = "INSERT INTO servicebyemail (email,name ) VALUES ('$data->email','$data->name')";
$qry = $conn->query($sql1);
}

else if($data->table=="inviteadmin"){
  $mail->Body = "<i><a href='http://localhost/OMSWEB/client/#/' >GO TO OUR WEBSITE</a> HELLO THIS IS ETHIOPIAN ONLINE MAID SERVICE, THE ADMINISTRATORS OF THE SITE INVITED YOU TO HIRE AS ADMINISTRATOR.   TO REGISTER PLEASE USE THIS CONFIRMATION NUMBER  </i>".$verificationcode;

$sql1 = "INSERT INTO inviteadmin (email,invitername,inviterid,verificationcode ) VALUES ('$data->email','$data->invitername','$data->inviterid','$verificationcode')";
$qry = $conn->query($sql1);
}

 $mail->AltBody = "This is the plain text version of the email content";

  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
    $response['status'] = 'Message has been sent successfully';
  }

/*} */
}else {
   $status="EMAIL ALREADY TAKEN";
   $response['status'] = 'EMAIL ALREADY TAKEN';
}
echo json_encode($response);
$conn->close();

?>