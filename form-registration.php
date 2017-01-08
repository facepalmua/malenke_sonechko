<?php
    if (isset($_COOKIE["lang"])){
        include('languages/' .$_COOKIE["lang"]. '.php');
    }
    else {
        include('languages/ru.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация на сайте "Маленьке сонечко"</title>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="all">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="css/style-footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="jquery-1.8.2.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/shop_script.js"></script>
    <script src="header.js"></script>
    <link rel="stylesheet" href="">

    <script src="jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
</head>
<body>
    <?php
        include("views/header.php");
    ?>
    <div class="wrapper-for-footer">
        <div class="somecontent">
            <p id="reg_message"></p>
            <div class="reg-form">
                <form action="reg/handler_reg.php" method="POST" id="reg-form">
                    <input type="text" name="username" id="username" placeholder="Логин" data-wow-delay=""  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required>
                    <img id="check_log" src=""></br>
                <input type="Password" name="password" id="password" placeholder="Ваш пароль" data-wow-delay="0.2s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё0-9]{5,15}" required></br>
            <input type="Password" name="password1" id="password1" placeholder="Повторите пароль" data-wow-delay="0.4s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё0-9]{5,15}" required>
            <img id="check_pass" src=""></br>
        <input type="text" name="name" id="name" placeholder="Имя" data-wow-delay="0.6s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required></br>
    <input type="text" name="surname" id="surname" placeholder="Фамилия" data-wow-delay="0.8s"  class="wow bounceInLeft" pattern="[A-Za-zА-Яа-яЁё]{5,15}" required></br>
<input type="text" name="email" id="email" placeholder="your@mail.com" data-wow-delay="1s"  class="wow bounceInLeft"  required></br>
<input type="text" name="place" id="place" placeholder="Город" data-wow-delay="1.2s"  class="wow bounceInLeft" list='city'  required></br>
<datalist id='city'>
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
                                                                                <input type="submit"  data-wow-delay="1.6s" class="btn btn-warning wow bounceInUp" value="Регистрация"></form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="footer">
                                                                        <?php
            include("footer.php");
        ?></div>
                                                                </div>
                                                                <script src="js/headhesive.js"></script>
                                                                <script src="js/headhesive_my.js"></script>

                                                                <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                                                                <script src="js/bootstrap.min.js"></script>
                                                                <script type="text/javascript" src="js/modernizr.custom.13303.js"></script>
                                                                <script src="js/jquery-1.8.2.min.js"></script>
                                                                <script src="js/shop_script.js"></script>
                                                                <script src="js/header.js"></script>
                                                                <script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
                                                                <script>var meganavURL = "meganav";</script>
                                                                <script src="js/wow.min.js"></script>
                                                                <script>new WOW().init();</script>
                                                                <script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
                                                                <script type="text/javascript" src="js/jquery.slicebox.js"></script>
                                                                <script src="js/footer.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>
                                                            </html>