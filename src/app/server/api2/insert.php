<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO maids (fname, sex, agerange, hieght, weight, martualstatus, noofchildren, educationlevel, offdays, expectedsallary, religion, description,availability,kebele,woreda,town, zone, region, language1, language2, language3, maidskill1, maidskill2, maidskill3, maidagency,maidagencyid) VALUES ('$data->fname', '$data->sex', '$data->agerange','$data->hieght','$data->weight','$data->martualstatus','$data->noofchildren','$data->educationlevel','$data->offdays','$data->expectedsallary','$data->religion','$data->description', '$data->availability', '$data->kebele', '$data->woreda', '$data->town', '$data->zone', '$data->region', '$data->language1', '$data->language2', '$data->language3', '$data->maidskill1', '$data->maidskill2', '$data->maidskill3',  '$data->maidagency','$data->maidagencyid')";
$qry = $conn->query($sql);
$conn->close();
?>