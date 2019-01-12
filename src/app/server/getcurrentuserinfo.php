<?php
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

$table=$data->usertype;
if($table=="customer"){
	$table="customer";
}elseif ($table=="admin") {
	$table="admin";
}
else{
	$table="agencies";
}

$sql = "SELECT * FROM $table WHERE id = '$data->id' and username = '$data->username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     $data = array() ;
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
echo json_encode($data);
$conn->close();
?>