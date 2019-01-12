<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
$res = "";

$sql = "SELECT * FROM maidrequest  WHERE maidid = '$data->maidid' and  customerid = '$data->customerid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     $res = true;
} else {
      $res = false;
}
echo $res;
$conn->close();
?>