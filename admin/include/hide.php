<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $title  = (isset($_POST['title'])) ? $_POST['title'] : "";
        
        $query = "SELECT * FROM products WHERE title='$title'";
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
        
        $product = mysqli_fetch_assoc($result);
        
        echo '<img src="../img/products/'.$product['image'].'" width="96px" height="128px" alt=""></br>
                <button id="'.$product['products_id'].' class = "hide-btn">Спрятать товар</button></br>
                <a href = "1.php">srgew</a>
              '.$product['title'];
    }
?>