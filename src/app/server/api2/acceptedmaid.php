<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$maidid="";
$data2 = array() ;
$sql = "SELECT * FROM maidrequest WHERE id = '$data->id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     $data = array() ;
    while($row = $result->fetch_assoc()) {
        $maidid = $row["maidid"];
    }

	$sql2 = "SELECT * FROM maids WHERE id = '$maidid'";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0) {
			    while($row2 = $result2->fetch_assoc()) {
			        $data2[] = $row2;
			    }}

} else {
    echo "0 results";
}

echo json_encode($data2);
$conn->close();
?>