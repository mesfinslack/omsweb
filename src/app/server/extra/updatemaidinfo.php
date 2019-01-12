<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omsdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "UPDATE maid SET 
fname='$data->fname',lname ='$data->lname', sex='$data->sex', maidtype='$data->maidtype', hieght='$data->hieght', weight='$data->weight', martualstatus='$data->martualstatus', noofchildren='$data->noofchildren', educationlevel='$data->educationlevel', offdays='$data->offdays', expectedsallary='$data->expectedsallary', language1='$data->language1', language2='$data->language2', language3='$data->language3', region='$data->region', zone='$data->zone', town='$data->town', religion='$data->religion', maidtype='$data->maidtype', maidskill1='$data->maidskill1', maidskill2='$data->maidskill2', maidskill3='$data->maidskill3', description='$data->description' WHERE id = $data->id ";

$qry = $conn->query($sql);
$conn->close();

?>