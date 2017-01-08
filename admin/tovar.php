<?php
    include("include/db_connect.php");
    $link = db_connect();
        
    $query = "SELECT * FROM products ORDER BY datetime DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

        $n = mysqli_num_rows($result);
        $product = array();

        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $product[] = $row;
        }
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="js/jQuery-v3.1.1.js"></script>
    <script type="text/javascript" src="js/admin_script.js"></script>

</head>
<body>

    <div id="block-header">

        <div id="block-header1" >
            <h3>Маленьке Сонечко. Панель Управления</h3>
            <p id="link-nav" ></p>
        </div>

        <div id="block-header2" >
            <p align="right">
                <a href="administrators.php" >Администраторы</a>
                |
                <a href="?logout">Выход</a>
            </p>
            <p align="right">
                Вы -
                <span>Администратор</span>
            </p>
        </div>

    </div>

    <div id="left-nav">
        <ul>
            <li>
                <a href="orders.php">Заказы</a>
            </li>
            <li>
                <a href="tovar.php">Товары</a>
            </li>
            <li>
                <a href="slider.php">Слайдер</a>
            </li>
            <li>
                <a href="clients.php">Клиенты</a>
            </li>
        </ul>
    </div>
    <div id="tovar-right">
    <div class="position-add">

        <a href="new_product.php">
            <button type="button" class="btn btn-default">Добавить новый товар</button>
        </a>
        <input type="search" id="search_product">
        <button type="submit" class="btn" id="button_search">Найти</button>
        </div>

        <div id="tovar">

            <?php foreach($product as $p) : ?>
            <?php
                if ($p['visible'] == 1) {
                    echo '<div class="search-form-block">
            <img src="../img/products/'.$p['image'].'" width="200px" height="250px" alt="">
            <p> <b></br>
                '.$p['title_ru'].'('.$p['code'].')</br> '.$p['quantity'].' упаковок</b> 
        </p>
        <button  id="'.$p['products_id'].'" class = "btn btn-default hide-btn " >Спрятать товар</button>
    </br>
    <button  id="'.$p['products_id'].'" class = "delete" >Удалить товар</button></br>
    <a href = "edit_product.php?id='.$p['products_id'].'">
        <button type="button" class="btn btn-default">Редактировать товар</button>
    </a>
</div>
';
                }

                else {
                    echo '
<div class="search-form-block">
    <img src="../img/products/'.$p['image'].'" width="180px" height="250px" alt=""></br> <b>'.$p['title'].'('.$p['code'].')</br> '.$p['quantity'].' упаковок</b>
</br>
</br>
<button id="'.$p['products_id'].'" class = "btn btn-default show-btn " >Показать товар</button>
</br>
<button  id="'.$p['products_id'].'" class = "delete" >Удалить товар</button></br>
</br>
<a href = "edit_product.php?id='.$p['products_id'].'">
<button class="btn btn-default">Редактировать товар</button>
</a>
</div>
';
                }
            ?>
<?php endforeach ?></div>
</div>

</body>
</html>