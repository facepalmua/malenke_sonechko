<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        
        $img = addslashes(trim($_POST["img"]));
        $product_id = addslashes(trim($_POST["id"]));
       
        
        $result = mysqli_query($link, "INSERT INTO slider(img,product_id,slider_datetime)
						VALUES(	
                            '$img',
                            '$product_id',
							NOW()
						    )");	

        if(!$result)
            die(mysqli_error($link));
       //echo"";
    }
?>