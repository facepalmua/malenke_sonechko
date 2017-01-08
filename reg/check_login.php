
<?php 
    include("../include/db_connect.php");
    $login = addslashes($_POST["login"]);
    $link = db_connect();
    $result = mysqli_query($link, "SELECT login FROM reg_user WHERE login = "."'".$login."'");

    if (mysqli_num_rows($result)>0){
         $result = true;
    }
    else {
        $result = false;
    }
    echo json_encode($result);  

  
?>