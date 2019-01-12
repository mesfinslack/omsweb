<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM maidrequest WHERE maidid='$data->maidid' AND customerid='$data->customerid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     $data = "'$data->customerid' successfully deleted";
  
} else {
     $data = "'$data->customerid' not successfully deleted";
}
echo json_encode($data);
$conn->close();
?>