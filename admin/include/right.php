<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $id = $_POST["id"];
        $v = $_POST["v"];
        
        if ($v == 0) {
            $update = mysqli_query ($link, "UPDATE reg_user SET wholesaler='0' WHERE id = '$id'");
        }
           
        else if ($v == 1){
            $update = mysqli_query ($link, "UPDATE reg_user SET wholesaler='1' WHERE id = '$id'");
        }
        if(!$result)
            die(mysqli_error($link));
        echo "";
    }
?>