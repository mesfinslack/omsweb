<?php 
$data = json_decode(file_get_contents("php://input"));
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$res="";
$response="";

$maid=[];
$sql1= "SELECT * FROM maids where  id = '$data->maidid' ";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
	    // output data of each row
	    while($row = $result1->fetch_assoc()) {
	        $maid = (object)$row;
	       $res=$maid->id;
	    }
	} else {
	    $response="no maid like thise";
	}

$customer=[];
$sql2= "SELECT * FROM customer where  id = '$data->customerid' ";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
	    while($row = $result2->fetch_assoc()) {
	        $customer = (object)$row;
	      // $res=$customer->id;
	    }
	} else {
	    $response= "no customer like thise";
	}

if(($customer)&&($maid)){

	$sql3 = "INSERT INTO maidrequest (maidid,maidname,maidavailability,customerid,customername,maidagencyid, maidagencyname) VALUES ('$maid->id', '$maid->fname','$maid->availability', '$customer->id','$customer->fname', '$maid->maidagencyid', '$maid->maidagency')";

	$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0) {
	   $response="successfully requseted";
	   
	} else {
	   $response="Not successfully requseted";
	}
}
else{
	   $response="No customer or maid found";
}


//echo json_encode($response);

echo json_encode($res);
$conn->close();
?>