<?php
    //error_reporting(E_ALL & ~E_NOTICE);
    include("../include/db_connect.php");
    $link = db_connect();

    session_start();
        
    if(isset($_SESSION["auth"])){
        $identifier = "login = '{$_SESSION["auth_login"]}'";
    }
    else {
        $identifier = "cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
    }

    $result = mysqli_query($link, "SELECT cart_price, cart_quantity FROM cart WHERE $identifier ");
    $int = 0;
    $itogpricecart = 0;
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        do{
            $int = $int + $row["cart_price"]; 
        }
        while ($row = mysqli_fetch_array($result));
        $itogpricecart = $int;
    }     
    echo $itogpricecart;
?>