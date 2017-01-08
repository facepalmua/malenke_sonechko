<?php
  error_reporting(E_ALL & ~E_NOTICE);
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

<link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" href="css/style-footer.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="css/animate.css">
<script src="js/jquery-1.8.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/header.js"</script> 
  <script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/shop_script.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script>

</head>
<body>
<div class="wrapper-for-footer">
  <?php
      include("views/header.php");
?>
  <div class="wrapper-filter-block">
    <div class="filter-block">
      <div class="sort-list-class"> <b><?=$_LANG["Sorting"]?>:</b>
        <a id="select-sort">
          <?=$sort_name?></a>
        <ul id="sorting-list">
          <li>
            <a id="price_asc" >От дешевых к дорогим</a>
          </li>
          <li>
            <a id="price_desc" >От дорогих к дешевым</a>
          </li>
          <li>
            <a id="pop" >Популярное</a>
          </li>
          <li>
            <a id="new" >Новинки</a>
          </li>
        </ul>
      </div>
      <div class="filter-box"> <b><p>
            <?=$_LANG["from"]?>
            <input type="text" id="price_from" size="2">
            до
            <input type="text" name="" id="price_to">грн</p></b> 
        <h2>
          <?=$_LANG["Choose_a_color"]?></h2>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Черный'" id="color_1" >
          <?=$_LANG["black"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Синий'" id="color_2" >
          <?=$_LANG["Blue"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Белый'" id="color_3" >
          <?=$_LANG["White"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Желтый'" id="color_4" >
          <?=$_LANG["Yellow"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Зеленый'" id="color_5" >
          <?=$_LANG["Green"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Оранжевый'" id="color_6" >
          <?=$_LANG["Orange"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Красный'" id="color_7" >
          <?=$_LANG["Red"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Голубой'" id="color_8" >
          <?=$_LANG["azure"]?></label>
        <label>
          <input type="checkbox" class="check_color" class="check_color" name="" value="'Розовый'" id="color_9" >
          <?=$_LANG["Pink"]?></label>
      </div>
    </div>

    <div class="content-position"></div>

  </div>
  <?php
            include("footer.php");
          ?></div>
</body>
</html>