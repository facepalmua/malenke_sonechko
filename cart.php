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
    session_start();
    if(isset($_SESSION["auth"])){
        $identifier = "login = '{$_SESSION["auth_login"]}'";
    }
    else {
        $identifier = "cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
    }
    $result = mysqli_query($link, "SELECT * FROM cart,products WHERE $identifier AND products.products_id = cart.cart_id_products ORDER BY cart_datetime DESC");
    $int = 0;
    $message = "";

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        do{
            $int = $int + ($row["price"] * $row["cart_quantity"]); 
        }
        while ($row = mysqli_fetch_array($result));
        $itogpricecart = $int;
    }  
    else {
        $message = $_LANG["shopping cart yet"];
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
    <meta name="yandex-verification" content="80419f573a6e0671">
	<title>Корзина</title>
   
</head>
<body>
	<?php
        include("views/header.php");
		?>	
        <div class="wrapper-for-footer">
	<div class="wrapper-cart">
    <p id="success_message"></p>
        <?php foreach($result as $r) : ?>
            <div class="cart-item">
                <div class="cart-image">
                    <img src="img/products/<?=$r['image']?>" width="240" height="320">
                </div>
                <p id="title-product"><a href="product.php?id=<?=$r['products_id']?>"><?=$r['title_'.$_COOKIE["lang"].'']?></a></p>
                 <?php
                    if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
                        $price = $r['cart_price'];
                        $price_wholesale = $r['price_wholesale'];
                        echo'<p> '.$_LANG["Price_per_piece"].': '.$price_wholesale.' UAH<br>';
                    }
                    else {
                        $price = $r['cart_price'];
                        echo'<p> '.$price.' UAH</p>';
                    }
                ?>
                <p><?=$_LANG["cart_quantity"]?>: <?=$r['cart_quantity']?></p>
                <p><?=$_LANG["cart_size"]?>: <?=$r['size']?></p>
                <p>Цвет: <?=$r['color_cart']?></p>
                <?php
                    if($r['comment']!=""){
                        echo '<p>'.$_LANG["additional_comments"].' '.$r['comment'].'</p>';
                    }
                ?>
                
                <p><button id="<?=$r['products_id']?>" type="button" class="delete_from_cart btn btn-danger"><?=$_LANG["delete"]?></button></p>
            </div>

        <?php endforeach ?>
       
        <p id="empty-cart"><?=$message?></p>
        <?php 
        if (mysqli_num_rows($result) > 0){
            echo '<p class="all-price-cart"><span id="all-price-cart"> </span> <span><img src="img/cart-grey.png" height="25px" width="25px" alt=""></span></p>
    <p><button type="button" id="acept-btn" data-wow-duration="3s" class="btn btn-success wow tada messageList" >'.$_LANG["confirm"].'</button></p>';
        }
        
    ?>
	</div>
    
     <div class="purchase-item">
         <?php 
         session_start();
            if (isset($_SESSION['auth'])) {
               echo '<div class="form-cart">
        <form action="" method="POST" id="form-cart-id">
           
            <input type="text" name="name" id="name" placeholder="Имя" data-wow-delay="0.6s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required value="'.$_SESSION["auth_name"].'">
            </br>
            <input type="text" name="surname" id="surname" placeholder="Фамилия" data-wow-delay="0.8s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required  value="'.$_SESSION["auth_surname"].'">
            </br>
            <input type="text" name="email" id="email" placeholder="your@mail.com" data-wow-delay="1s"  class="wow bounceInLeft"  required  value="'.$_SESSION["auth_email"].'">
            </br>
            <input type="text" name="place" id="place" placeholder="Город" data-wow-delay="1.2s"  class="wow bounceInLeft" list="city"  required  value="'.$_SESSION["auth_place"].'">
            </br>
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
                <option label="Черновцы" value="Черновцы">
            </datalist>
            <input type="text" name="post_office" id="post_office" placeholder="Отделение новой почты" data-wow-delay="1.4s"  class="wow bounceInLeft"  required  value="Новая почта  '.$_SESSION["auth_post"].'">
            </br>
            <input type="text" name="phone_number" id="phone_number" placeholder="+38(0XX)XXXXXXX" data-wow-delay="1.6s"  class="wow bounceInLeft" pattern="[0-9()+-&nbsp;]{5,19}" required  value="'.$_SESSION["auth_number"].'">
            <br>
            <input type="submit"  data-wow-delay="1.6s" class="btn btn-warning wow bounceInUp" value="'.$_LANG["Checkout"].'">
        </form>
     </div>';
            }
            else {
                echo '<div class="form-cart">
        <form action="" method="POST" id="form-cart-id">
           
            <input type="text" name="name" id="name" placeholder="Имя" data-wow-delay="0.6s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required>
            </br>
            <input type="text" name="surname" id="surname" placeholder="Фамилия" data-wow-delay="0.8s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required>
            </br>
            <input type="text" name="email" id="email" placeholder="your@mail.com" data-wow-delay="1s"  class="wow bounceInLeft"  required>
            </br>
            <input type="text" name="place" id="place" placeholder="Город" data-wow-delay="1.2s"  class="wow bounceInLeft" list="city"  required>
            </br>
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
                <option label="Черновцы" value="Черновцы">
            </datalist>
            <input type="text" name="post_office" id="post_office" placeholder="Отделение новой почты" data-wow-delay="1.4s"  class="wow bounceInLeft"  required>
            </br>
            <input type="text" name="phone_number" id="phone_number" placeholder="+38(0XX)XXXXXXX" data-wow-delay="1.6s"  class="wow bounceInLeft" pattern="[0-9()+-&nbsp;]{5,19}" required>
            <br>
            <input type="submit"  data-wow-delay="1.6s" class="btn btn-warning wow bounceInUp" value="'.$_LANG["Checkout"].'">
        </form>
     </div>';
            }
         ?>
         
    
<div class="footer">
        <?php
            include("footer.php");
        ?>  
    </div>
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