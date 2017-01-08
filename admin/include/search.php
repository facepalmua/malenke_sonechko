<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $title  = (isset($_POST['title'])) ? $_POST['title'] : "";
        if ($title != "") {
            $query = "SELECT * FROM products WHERE (title_ru='$title' OR code = '$title')";
            $result = mysqli_query($link, $query);

            if(!$result)
                die(mysqli_error($link));

            $product = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0){
                if ($product['visible'] == 1) {
                    echo '<div class="search-form-block"><img src="../img/products/'.$product['image'].'" width="200px" height="250px" alt=""><p><b></br>
                    '.$product['title_ru'].'('.$product['code'].')</br> '.$product['quantity'].' упаковок</b></p>
                        <button  id="'.$product['products_id'].'" class = "btn btn-default hide-btn " >Спрятать товар</button></br>
                        <button  id="'.$p['products_id'].'" class = "delete" >Удалить товар</button></br>
                        <a href = "edit_product.php?id='.$product['products_id'].'"><button type="button" class="btn btn-default">Редактировать товар</button></a></div>';
                }

                else {
                    echo '<img src="../img/products/'.$product['image'].'" width="180px" height="250px" alt=""></br><b>
                    '.$product['title'].'('.$product['code'].')</br> '.$product['quantity'].' упаковок</b></br></br>
                        <button id="'.$product['products_id'].'" class = "btn btn-default show-btn " >Показать товар</button></br>
                        <button  id="'.$p['products_id'].'" class = "delete" >Удалить товар</button></br>
                        <a href = "edit_product.php?id='.$product['products_id'].'"><button class="btn btn-default">Редактировать товар</button></a>';
                }
            
            }
        }
        
    }
?>