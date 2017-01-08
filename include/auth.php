<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $login = $_POST["login"];

        $pass   = md5($_POST["pass"]);


        //if ($_POST["rememberme"] == "yes"){

                //setcookie("rememberme",$login.'+'.$pass,time()+3600*24*31, "/");

        //}

        $query = "SELECT * FROM reg_user WHERE (login = '$login' OR email = '$login') AND password = '$pass'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION["auth_pass"] = $row["password"];
            $_SESSION["auth_login"] = $row["login"];
            $_SESSION["auth_surname"] = $row["surname"];
            $_SESSION["auth_name"] = $row["name"];
            $_SESSION["auth_email"] = $row["email"];
            $_SESSION["auth_place"] = $row["place"];
            $_SESSION["auth_post"] = $row["post_office"];
            $_SESSION["auth_number"]= $row["phone"];
            if($row["wholesaler"] == "1"){
                $_SESSION["auth"] = "yes_auth_wholesaler";
                echo "yes_auth_wholesaler";
            }
            else{
                $_SESSION["auth"] = "yes_auth";
                echo "yes_auth";
            }
             
        }
        else{
            echo "no_auth";
        }  
    } 
?>