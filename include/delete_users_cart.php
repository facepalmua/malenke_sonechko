<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        session_start();
        if($_SESSION["auth"] != ""){
            $identifier = "login = '{$_SESSION["auth_login"]}'";
        }
        else {
            $identifier = "cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
        }
        $query = sprintf("DELETE FROM cart WHERE $identifier ");
        $result = mysqli_query($link, $query);
        
        echo "";
    }
?>