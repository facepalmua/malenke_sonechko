<?php
    if (isset($_COOKIE["lang"])){
        include('languages/' .$_COOKIE["lang"]. '.php');
    }
    else {
        include('languages/ru.php');
    }
    //error_reporting(E_ALL & ~E_NOTICE);
    include("include/db_connect.php");
    $link = db_connect();
    $message = "";
    $request = $_COOKIE["request"];
    $products = array();
    if ($request != "") {
        $query = "SELECT * FROM products WHERE visible = '1' AND (title_".$_COOKIE['lang']." LIKE '%$request%' OR code = '$request')";
        $result = mysqli_query($link, $query);
        
        if(!$result)
        die(mysqli_error($link));
        if (mysqli_num_rows($result) >0){
            $n = mysqli_num_rows($result);

            for($i = 0; $i< $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $products[] = $row;
            }
        }
        else {
            $message = "Ничего не найдено";
        }

    }
    else {
        $message = "Введите запрос";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" href="css/style-footer.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<title>Поиск</title>

</head>
<body>
<?php
include("views/header.php");
?>
<div class="wrapper-for-footer">
<div class="wrapper-cart">
<div class="content2">

<div class="grid">
<span id="search-message"><?=$message?></span>
<?php foreach($products as $p) : ?>
<?php 
if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
$price = $p['price'];
$price_wholesale = $p['price_wholesale'];
echo'<b class="price-position">'.$_LANG["retail_price"].': '.$price.' UAH
<br>'.$_LANG["Wholesale_price"].': '.$price_wholesale.' UAH</b>
';
}
else {
$price = $p['price'];
echo' <b class="price-position2">'.$price.' UAH</b>
';
}
?>
<figure class="effect-chico">
<a href="product.php?id=<?=$p['products_id']?>
">
<img src="img/products/<?=$p['image']?>
"
alt="">
<figcaption>
    <p>
        <?=$_LANG["Add_to_Basket"]?>
        <img id="cart-white"  src="img/cart_white.png" alt="cart">
        <?=$p['title_'.$_COOKIE["lang"].'']?>
        <br> <b><?=$p['price']?>UAH</b>
    </p>
</figcaption>
</a>
</figure>
<?php endforeach ?></div>

</div>
</div>

<div class="purchase-item">
<?php 
session_start();
if (isset($_SESSION['auth'])) {
echo '<div class="form-cart">
<form action="" method="POST" id="form-cart-id">

<input type="text" name="name" id="name" placeholder="Имя" data-wow-delay="0.6s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required value="'.$_SESSION["auth_name"].'"></br>
<input type="text" name="surname" id="surname" placeholder="Фамилия" data-wow-delay="0.8s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required  value="'.$_SESSION["auth_surname"].'"></br>
<input type="text" name="email" id="email" placeholder="your@mail.com" data-wow-delay="1s"  class="wow bounceInLeft"  required  value="'.$_SESSION["auth_email"].'"></br>
<input type="text" name="place" id="place" placeholder="Город" data-wow-delay="1.2s"  class="wow bounceInLeft" list="city"  required  value="'.$_SESSION["auth_place"].'"></br>
<datalist id="city">
<option label="Винница" value="Винница">
<option label="Днепр" value="Днепр">
<option label="Донецк" value="Донецк">
<option label="Житомир" value="Житомир">
<option label="Запорожье" value="Запорожье">
<option label="Ивано-Франковск" value="Ивано-Франковск">
<option label="Киев" value="Киев">
    <option label="Луганск" value="Луганск">
        <option label="Луцк" value="Луцк">
            <option label="Львов" value="Львов">
                <option label="Николаев" value="Николаев">
                    <option label="Одесса" value="Одесса">
                        <option label="Полтава" value="Полтава">
                            <option label="Ровно" value="Ровно">
                                <option label="Сумы" value="Сумы">
                                    <option label="Тернополь" value="Тернополь">
                                        <option label="Ужгород" value="Ужгород">
                                            <option label="Харьков" value="Харьков">
                                                <option label="Херсон" value="Херсон">
                                                    <option label="Хмельницкий " value="Хмельницкий ">
                                                        <option label="Черкассы" value="Черкассы">
                                                            <option label="Чернигов" value="Чернигов">
                                                                <option label="Черновцы" value="Черновцы"></datalist>
                                                                <input type="text" name="post_office" id="post_office" placeholder="Отделение новой почты" data-wow-delay="1.4s"  class="wow bounceInLeft"  required  value="Новая почта  '.$_SESSION["auth_post"].'"></br>
                                                            <input type="text" name="phone_number" id="phone_number" placeholder="+38(0XX)XXXXXXX" data-wow-delay="1.6s"  class="wow bounceInLeft" pattern="[0-9()+-&nbsp;]{5,19}" required  value="'.$_SESSION["auth_number"].'">
                                                            <br>
                                                            <input type="submit"  data-wow-delay="1.6s" class="btn btn-warning wow bounceInUp" value="'.$_LANG["Checkout"].'"></form>
                                                    </div>
                                                    ';
}
else {
echo '
                                                    <div class="form-cart">
                                                        <form action="" method="POST" id="form-cart-id">

                                                            <input type="text" name="name" id="name" placeholder="Имя" data-wow-delay="0.6s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required></br>
                                                        <input type="text" name="surname" id="surname" placeholder="Фамилия" data-wow-delay="0.8s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required></br>
                                                    <input type="text" name="email" id="email" placeholder="your@mail.com" data-wow-delay="1s"  class="wow bounceInLeft"  required></br>
                                                <input type="text" name="place" id="place" placeholder="Город" data-wow-delay="1.2s"  class="wow bounceInLeft" list="city"  required></br>
                                            <datalist id="city">
                                                <option label="Винница" value="Винница">
                                                    <option label="Днепр" value="Днепр">
                                                        <option label="Донецк" value="Донецк">
                                                            <option label="Житомир" value="Житомир">
                                                                <option label="Запорожье" value="Запорожье">
                                                                    <option label="Ивано-Франковск" value="Ивано-Франковск">
                                                                        <option label="Киев" value="Киев">
                                                                            <option label="Луганск" value="Луганск">
                                                                                <option label="Луцк" value="Луцк">
                                                                                    <option label="Львов" value="Львов">
                                                                                        <option label="Николаев" value="Николаев">
                                                                                            <option label="Одесса" value="Одесса">
                                                                                                <option label="Полтава" value="Полтава">
                                                                                                    <option label="Ровно" value="Ровно">
                                                                                                        <option label="Сумы" value="Сумы">
                                                                                                            <option label="Тернополь" value="Тернополь">
                                                                                                                <option label="Ужгород" value="Ужгород">
                                                                                                                    <option label="Харьков" value="Харьков">
                                                                                                                        <option label="Херсон" value="Херсон">
                                                                                                                            <option label="Хмельницкий " value="Хмельницкий ">
                                                                                                                                <option label="Черкассы" value="Черкассы">
                                                                                                                                    <option label="Чернигов" value="Чернигов">
                                                                                                                                        <option label="Черновцы" value="Черновцы"></datalist>
                                                                                                                                        <input type="text" name="post_office" id="post_office" placeholder="Отделение новой почты" data-wow-delay="1.4s"  class="wow bounceInLeft"  required></br>
                                                                                                                                    <input type="text" name="phone_number" id="phone_number" placeholder="+38(0XX)XXXXXXX" data-wow-delay="1.6s"  class="wow bounceInLeft" pattern="[0-9()+-&nbsp;]{5,19}" required>
                                                                                                                                    <br>
                                                                                                                                    <input type="submit"  data-wow-delay="1.6s" class="btn btn-warning wow bounceInUp" value="'.$_LANG["Checkout"].'"></form>
                                                                                                                            </div>
                                                                                                                            ';
}
?>
                                                                                                                            <div class="footer">
                                                                                                                                <?php
include("footer.php");
?></div>
</div>
</div>

<!-- JavaScript -->

<script src="js/headhesive.js"></script>
<script src="js/headhesive_my.js"></script>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.13303.js"></script>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/shop_script.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script>

<script src="js/header.js"></script>
<script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
<script>var meganavURL = "meganav";</script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.slicebox.js"></script>
<script src="js/footer.js"></script>

</body>
                                                                                                                </html>