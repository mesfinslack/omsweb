<?php

$data = json_decode(file_get_contents("php://input"));

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



$sql1 = "SELECT * from maids where maidagencyid = $data->agencyid ";
$result1 = $conn->query($sql1);
$allmaid = mysqli_num_rows($result1);

$sql21 = "SELECT  * from maidrequest where respond='' and maidagencyid = $data->agencyid ";
$result21 = $conn->query($sql21);
$allpendingrequest = mysqli_num_rows($result21);

$sql22 = "SELECT  * from maidrequest where respond='rejected' and maidagencyid = $data->agencyid ";
$result22 = $conn->query($sql22);
$allrejectedrequest = mysqli_num_rows($result22);

$sql23 = "SELECT  * from maidrequest where respond='accepted' and maidagencyid = $data->agencyid ";
$result23 = $conn->query($sql23);
$allacceptedrequest = mysqli_num_rows($result23);



$sql3 = "SELECT * from agencyreport ORDER BY id DESC LIMIT 1";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
        $previesreport[] = $row;

$newmaid =  (int)($allmaid) - (int)($row["allmaid"]);
$pendingrequest =  (int)($allpendingrequest) - (int)($row["allpendingrequest"]);
$acceptedrequest=  (int)($allacceptedrequest)- (int)($row["allacceptedmaid"]);
$rejectedrequest =  (int)($allrejectedrequest )- (int)($row["allrejectedrequest"]);

    }
}
else{
	$response="no previos";
$newmaid = $allmaid;
$pendingrequest = $allrequestpending ;
$acceptedrequest= $allrequestaccepted;
$rejectedrequest = $allrequestrejected;
}

$sql = "INSERT into agencyreport (newmaid,pendingrequest,rejectedrequest,acceptedrequest,allmaid,allacceptedmaid,allrejectedrequest,allpendingrequest,agencyid )  values ( '$newmaid ', '$pendingrequest ', '$rejectedrequest ', '$acceptedrequest ', '$allmaid ', '$allacceptedrequest ', '$allrejectedrequest ','$allpendingrequest',$data->agencyid) ";

$result = $conn->query($sql);
if ($result3->num_rows > 0) {
$response=$data->agencyid;
 }
else{
$response="notsuccessfull"; }




$conn->close();

echo json_encode($response);

?>
