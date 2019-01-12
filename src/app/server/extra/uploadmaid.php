<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omsdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO maid (fname, lname, sex, maidtype,hieght,weight,martualstatus,noofchildren,educationlevel,offdays,expectedsallary,language1,language2,language3,region,zone,town,religion,maidtype,maidskill1,maidskill2,maidskill3,description) VALUES ('$data->fname', '$data->lname', '$data->sex', '$data->maidtype','$data->hieght','$data->weight','$data->martualstatus','$data->noofchildren','$data->educationlevel','$data->offdays','$data->expectedsallary','$data->language1','$data->language2','$data->language3','$data->region','$data->zone','$data->town','$data->religion','$data->maidtype','$data->maidskill1','$data->maidskill2','$data->maidskill3','$data->description')";
$qry = $conn->query($sql);
$conn->close();
?>