<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE maids SET fname ='$data->fname', agerange ='$data->agerange', sex ='$data->sex', hieght ='$data->hieght', weight ='$data->weight', martualstatus ='$data->martualstatus', noofchildren ='$data->noofchildren', educationlevel ='$data->educationlevel', offdays ='$data->offdays', expectedsallary ='$data->expectedsallary', religion ='$data->religion', description ='$data->description', availability ='$data->availability', kebele ='$data->kebele', woreda ='$data->woreda', town ='$data->town', zone ='$data->zone', region ='$data->region', language1 ='$data->language1', language2 ='$data->language2', language3 ='$data->language3', maidskill1 ='$data->maidskill1', maidskill2 ='$data->maidskill2', maidskill3 ='$data->maidskill3', maidagency ='$data->maidagency' WHERE id = $data->id ";

$qry = $conn->query($sql);
$conn->close();
?>