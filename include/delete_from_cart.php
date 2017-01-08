<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        session_start();
        $id = $_POST["id"];
        if($_SESSION["auth"] != ""){
            $identifier = "login = '{$_SESSION["auth_login"]}'";
        }
        else {
            $identifier = "cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
        }
        $query = sprintf("DELETE FROM cart WHERE $identifier AND cart_id_products='%d'", $id);
        $result = mysqli_query($link, $query);
        
        $result = mysqli_query($link, "SELECT * FROM cart,products WHERE $identifier AND products.products_id = cart.cart_id_products ORDER BY cart_datetime DESC");
        $products = array();
        $n = mysqli_num_rows($result);
        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $products[] = $row;
        }
        
        foreach($products as $p) {
            echo '<div class="cart-item">
                    <div class="cart-image">
                        <img src="img/products/'.$p['image'].'" width="240" height="320">
                    </div>
                    <p>'.$p['title'].'</p>
                    <p>'.$p['price'].' UAH</p>
                    <!--<p>РАЗМЕР: 46</p>
                    <p>Ткань верха: 100% полиэстер, плащевка "Лаке" с актуальным принтом</p>-->
                    <p><button type="button" id = "qwe" class="btn btn-success">Подтвердить</button></p>
                    <p><button id="'.$p['cart_id_products'].'" type="button" class="delete_from_cart btn btn-danger">Удалить</button></p>
                </div>';
        }
    }
?>