<?php


define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "mydb");
$connect=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("database error or connection error");

$data=json_decode(file_get_contents("php://input"));
$response = array() ;
	if(!empty($_FILES['image1'])&&!empty($_FILES['image2'])&&!empty($_FILES['image3']))
	{
		
		if ((($_FILES["image1"]["type"] == "image/png")&&($_FILES["image2"]["type"] == "image/png")&&($_FILES["image3"]["type"] == "image/png") || ($_FILES["image1"]["type"] == "image/jpg")&&($_FILES["image2"]["type"] == "image/jpg")&&($_FILES["image3"]["type"] == "image/jpg") || ($_FILES["image1"]["type"] == "image/gif")&&($_FILES["image2"]["type"] == "image/gif")&&($_FILES["image3"]["type"] == "image/gif") || ($_FILES["image1"]["type"] == "image/jpeg")&&($_FILES["image2"]["type"] == "image/jpeg")&&($_FILES["image3"]["type"] == "image/jpeg"))) 
		{

			if (($_FILES["image1"]["error"] > 0)&&($_FILES["image2"]["error"] > 0)&&($_FILES["image3"]["error"] > 0))
			{
            		echo "File is error";
        	} 
        	else 
        		{

					$ext = pathinfo($_FILES['image1']['name'],PATHINFO_EXTENSION);
					$ext2= pathinfo($_FILES['image2']['name'],PATHINFO_EXTENSION);
					$ext3= pathinfo($_FILES['image3']['name'],PATHINFO_EXTENSION);
                	$image = time().date("dmY").'1'.'.'.$ext;
                	$image2 = time().date("dmY").'2'.'.'.$ext2;
                	$image3 = time().date("dmY").'3'.'.'.$ext3;
               

    	move_uploaded_file($_FILES["image1"]["tmp_name"], "C:\\xampp\\htdocs\\OMSWEB\\client\\images\\maids\\".$image);
    	move_uploaded_file($_FILES["image2"]["tmp_name"], "C:\\xampp\\htdocs\\OMSWEB\\client\\images\\maids\\".$image2);
    	move_uploaded_file($_FILES["image3"]["tmp_name"], "C:\\xampp\\htdocs\\OMSWEB\\client\\images\\maids\\".$image3);
	
           //	echo "Image uploaded successfully as ".$image.$image2.$image3;
     
        $response['image1'] = $image;
        $response['image2'] = $image2;
        $response['image3'] = $image3; 
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