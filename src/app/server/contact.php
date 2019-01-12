<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO contactus (fname, language1, language2, language3, maidskill1,maidagencyid) VALUES ('$data->fname', '$data->sex', '$data->agerange','$data->hieght','$data->noofchildren',  '$data->maidagency','$data->maidagencyid')";
$qry = $conn->query($sql);
$conn->close();
?>