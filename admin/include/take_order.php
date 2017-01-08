<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        
        $login = trim($_POST["login"]);
        
        mysqli_query($link, "UPDATE orders SET active = '0' WHERE order_email='$login'");	
        
        mail($login, "Маленьке сонечко", "Ваш заказ принят",'From: zakaz@gmail.com '); 
        echo "";
    }
?>