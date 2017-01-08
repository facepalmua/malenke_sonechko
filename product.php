<?php
    include("include/db_connect.php");
    include("models/products.php");

    $link = db_connect();
    $id = (isset($_GET['id'])) ? $_GET['id'] : "";
    $product = product_get($link, $id);
    include("views/product.php");
?>