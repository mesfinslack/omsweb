<?php


define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "mydb");
$connect=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("database error or connection error");

$data=json_decode(file_get_contents("php://input"));
$response = array() ;
	if(!empty($_FILES['image1']))
	{
		
		if ((($_FILES["image1"]["type"] == "application/pdf")||($_FILES["image1"]["type"] == "image/png")|| ($_FILES["image1"]["type"] == "image/jpg")|| ($_FILES["image1"]["type"] == "image/gif")|| ($_FILES["image1"]["type"] == "image/jpeg"))) 
		{ 

			if (($_FILES["image1"]["error"] > 0))
			{
            		echo "File is error";
        	} 
        	else 
        		{

					$ext = pathinfo($_FILES['image1']['name'],PATHINFO_EXTENSION);
                	$image = time().date("dmY").'1'.'.'.$ext;
               

    	move_uploaded_file($_FILES["image1"]["tmp_name"], "C:\\xampp\\htdocs\\OMSWEB\\client\\images\\agencies\\agencyrequest\\".$image);
	
           //	echo "Image uploaded successfully as ".$image.$image2.$image3;
     
        $response['image1'] = $image;
        $response['status'] = "inserted successfully";

					}
		}
		else
		{     $response['status'] = "file is too big size or unsupported";
			//echo "file must be in jpeg, jpg, png, gif";  
}
	}
	else
	{
        $response['status'] = "file is empty";
		//echo "Image Is Empty";
	}

echo json_encode($response);

?> 