<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $id = $_POST["id"];
        $v = $_POST["v"];
        
        if ($v == 0) {
            $update = mysqli_query ($link, "UPDATE products SET visible='0' WHERE products_id = '$id'");
        }
           
        else if ($v == 1){
            $update = mysqli_query ($link, "UPDATE products SET visible='1' WHERE products_id = '$id'");
        }
        
        echo "";
    }
?>