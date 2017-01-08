<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $request  = (isset($_POST['request'])) ? $_POST['request'] : "";
        if ($request != "") {
            $query = "SELECT * FROM products WHERE (title_ru='$request' OR code = '$request')";
            $result = mysqli_query($link, $query);

            if(!$result)
                die(mysqli_error($link));

            $product = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0){
                if ($product['visible'] == 1) {
                    echo '<div class="search-form-block"><img src="../img/products/'.$product['image'].'" width="200px" height="250px" alt=""><p><b></br>
                    '.$product['title_ru'].'('.$product['code'].')</b></p>
                        <button  id="'.$product['products_id'].'" class = "btn btn-default hide-btn " >Спрятать товар</button></br>
                        <a href = "edit_product.php?id='.$product['products_id'].'"><button type="button" class="btn btn-default">Редактировать товар</button></a></div>';
                }

                else {
                    echo '<img src="../img/products/'.$product['image'].'" width="180px" height="250px" alt=""></br><b>
                    '.$product['title'].'('.$product['code'].')</b></br></br>
                        <button id="'.$product['products_id'].'" class = "btn btn-default show-btn " >Показать товар</button></br></br>
                        <a href = "edit_product.php?id='.$product['products_id'].'"><button class="btn btn-default">Редактировать товар</button></a>';
                }
            
            }
        }
        
    }
?>