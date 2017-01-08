<?php
    error_reporting(E_ALL & ~E_NOTICE);
    include("include/db_connect.php");
    include("models/products.php");
    if (isset($_COOKIE["lang"])){
        include('languages/' .$_COOKIE["lang"]. '.php');
    }
    else {
        include('languages/ru.php');
    }
    $link = db_connect();

    $category = (isset($_POST['category'])) ? $_POST['category'] : "";
    $age = (isset($_POST['age'])) ? $_POST['age'] : "";
    $sex = (isset($_POST['sex'])) ? $_POST['sex'] : "";
    $sort = (isset($_POST['sort'])) ? $_POST['sort'] : "";
    $price_from = (isset($_POST['price_from'])) ? (int)$_POST['price_from'] : "";
    $price_to = (isset($_POST['price_to'])) ? (int)$_POST['price_to'] : "";
    $color = (isset($_POST['color'])) ? $_POST['color'] : "";
    $query_sort = sort_all($sort);
    if (!empty($category)){
        $products = products_sort($link, $category, $age, $sex, $query_sort, $price_from, $price_to, $color);
        foreach($products as $p) {
            session_start();
            if(isset($_SESSION["auth"])){
                if ($_SESSION["auth"] == "yes_auth_wholesaler"){
                    $price = $p['price'];
                    $price_wholesale = $p['price_wholesale'];
                    $price = "<b>Розничная цена: $price UAH
    <br>Оптовая цена: $price_wholesale UAH</b>
    ";
                }
                else {
                    $price = $p['price'];
                    $price = " <b>$price UAH</b>
    ";
                }
                echo '
    <div class="content">
    <div class="grid">
        <!--<b>'.$p['price'].'UAH</b>
    -->
                        '.$price.'
    <figure class="effect-chico">
        <a href="product.php?id='.$p['products_id'].'">
            <img src="img/products/'.$p['image'].'" alt="">
            <figcaption>
                <p>
                    '.$_LANG["Add_to_Basket"].'
                    <img id="cart-white"  src="img/cart_white.png" alt="cart">
                    '.$p['title_'.$_COOKIE["lang"].''].'
                    <br> <b>'.$p['price'].'UAH</b>
                </p>
            </figcaption>
        </a>
    </figure>

    </div>

    <!--  </div>--></div>
    ';
                }

            else {
                echo '
    <div class="content">
    <div class="grid">
    <b>'.$p['price'].'UAH</b>
    <figure class="effect-chico">
        <a href="product.php?id='.$p['products_id'].'">
            <img src="img/products/'.$p['image'].'" alt="">
            <figcaption>
                <p>
                    '.$_LANG["Add_to_Basket"].'
                    <img id="cart-white"  src="img/cart_white.png" alt="cart">
                    '.$p['title_'.$_COOKIE["lang"].''].'
                    <br>
                    <b>'.$p['price'].'UAH</b>
                </p>
            </figcaption>
        </a>
    </figure>

    </div>

    <!--  </div>--></div>
    ';
                }
            }
    }
    
        
        
    
?>