<?php

//$data = json_decode(file_get_contents("php://input"));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$newmaid =0 ;
$pendingrequest =0 ;
$acceptedrequest= 0 ;
$rejectedrequest =0 ;
$response="";
$previesreport = array();



$sql1 = "SELECT * from agencies ";
$result1 = $conn->query($sql1);
$allagency = mysqli_num_rows($result1);

$sql21 = "SELECT  * from agencyrequest";
$result21 = $conn->query($sql21);
$allpendingagency = mysqli_num_rows($result21);

$sql22 = "SELECT  * from agencyrequest where response='rejected'";
$result22 = $conn->query($sql22);
$allrejectedagency = mysqli_num_rows($result22);

$sql23 = "SELECT  * from agencyrequest where response='accepted'";
$result23 = $conn->query($sql23);
$allacceptedagency = mysqli_num_rows($result23);



$sql3 = "SELECT * from adminreport ORDER BY id DESC LIMIT 1";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {

$newagency =  (int)($allagency) - (int)($row["allagency"]);
$pendingagency =  (int)($allpendingagency) - (int)($row["allpendingagency"]);
$acceptedagency=  (int)($allacceptedagency)- (int)($row["allacceptedagency"]);
$rejectedagency=  (int)($allrejectedagency)- (int)($row["allrejectedagency"]);

    }
}
else{
	$response="no previos";
$newagency = $allagency;
$pendingagency = $allpendingagency ;
$acceptedagency= $allacceptedagency;
$rejectedagency = $allrejectedagency;
}

$sql = "INSERT into adminreport (newagency,pendingagency,rejectedagency,acceptedagency,allagency,allacceptedagency,allrejectedagency,allpendingagency )  values ( '$newagency ', '$pendingagency ', '$rejectedagency ', '$acceptedagency ', '$allagency ', '$allacceptedagency ', '$allrejectedagency ', '$allpendingagency ') ";
$result = $conn->query($sql);
if ($result3->num_rows > 0) {
$response="successfull";
 }
else{
$response="notsuccessfull"; }




$conn->close();

echo json_encode($response);

?>
