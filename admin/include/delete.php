<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        session_start();
        $id = $_POST["id"];
       
        $query = sprintf("DELETE FROM products WHERE products_id='%d'", $id);
        $result = mysqli_query($link, $query);
        
        
    }
?>