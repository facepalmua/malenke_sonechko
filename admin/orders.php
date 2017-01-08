<?php
    include("include/db_connect.php");
    $link = db_connect();

    $result = mysqli_query($link, "SELECT * FROM orders WHERE active='1' GROUP BY order_email  ORDER BY order_datetime DESC");
    if(!$result)
            die(mysqli_error($link));
    $n = mysqli_num_rows($result);
    $orders = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $orders[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Заказы</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
   <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/html2canvas.js"></script>
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
<p align="right"><a href="administrators.php" >Администраторы</a> | <a href="?logout">Выход</a></p>
<p align="right">Вы - <span>Администратор</span></p>
</div>

</div>

<div id="active_orders">
    <button id="button_active">Все заказы</button>
    <?php foreach($orders as $o) : ?>
    <div class="order" id="id<?=$o['order_id']?>">
      <?php 
            $email = $o['order_email'];
            $result = mysqli_query($link, "SELECT * FROM orders,products WHERE orders.active='1' AND products.products_id = orders.order_id_product AND order_email='$email' ORDER BY order_datetime DESC");
            if(!$result)
                die(mysqli_error($link));
            $n = mysqli_num_rows($result);
            $products = array();

            for($i = 0; $i < $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $products[] = $row;
            }
        $price = 0;
      ?>
        <p>
        <table class="table">
  <thead>
    <tr>
      
      <th>Имя</th>
      <th>Фамилия</th>
       <th>E-mail</th>
      <th>Город</th>
       <th>Почта</th>
      <th>Время</th>
       </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?=$o['order_name']?></td>
      <td><?=$o['order_surname']?></td>
      <td><?=$o['order_email']?></td>
      <td><?=$o['order_place']?></td>
      <td><?=$o['order_post_office']?></td>
      <td><?=$o['order_datetime']?></td>


    </tr>
   
  </tbody>
</table>
            </p>
    <table class="table">
    <thead>
    <tr>
      
      <th>Цена</th>
      <th>Название</th>
       <th>Размер</th>
        <th>Цвет</th>
      <th>Количество</th>
      <th>Сумма</th> 
        <th>Доп. пожелания</th> 
       </tr>
  </thead>
        <?php foreach($products as $p) : ?>
    <?php
     $price = $price + $p['order_price'];
    ?>
  
  <tbody>
    <tr>
     
      <td><?=$p['order_price']?></td>
      <td><?=$p['title_ru']?></td>
      <td> <?=$p['order_size']?></td>
    <td> <?=$p['order_color']?></td>
      <td><?=$p['order_quantity']?></td>
      <td><?=$p['order_price']?></td>
        <td><?=$p['order_comment']?></td>

    </tr>
   
  </tbody>
        <?php endforeach ?>
</table>
    
        
    <p id="price">Общая цена: <?=$price?> грн</p>
    </div>
    <div class="btn-pos-admin">
        
    <button type="button" id="<?=$o['order_email']?>" class="take_order btn btn-success" name="id<?=$o['order_id']?>">Принять заказ</button></div>
  <?php endforeach ?>  
</div>

    
    
    
    <div id="orders">
        <button id="button_orders">Активные заказы</button>
        <?php
            $result = mysqli_query($link, "SELECT * FROM orders  GROUP BY order_email  ORDER BY order_datetime DESC");
            if(!$result)
                    die(mysqli_error($link));
            $n = mysqli_num_rows($result);
            $orders = array();

            for($i = 0; $i < $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $orders[] = $row;
            }
        ?>
        <?php foreach($orders as $o) : ?>
        <div class="order" id="id<?=$o['order_id']?>">
      <?php 
            $email = $o['order_email'];
            $result = mysqli_query($link, "SELECT * FROM orders,products WHERE  products.products_id = orders.order_id_product AND order_email='$email' ORDER BY order_datetime DESC");
            if(!$result)
                die(mysqli_error($link));
            $n = mysqli_num_rows($result);
            $products = array();

            for($i = 0; $i < $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $products[] = $row;
            }
        $price = 0;
      ?>
        <p>
        <table class="table">
  <thead>
    <tr>
      
      <th>Имя</th>
      <th>Фамилия</th>
       <th>E-mail</th>
      <th>Город</th>
       <th>Почта</th>
      <th>Время</th>
       </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?=$o['order_name']?></td>
      <td><?=$o['order_surname']?></td>
      <td><?=$o['order_email']?></td>
      <td><?=$o['order_place']?></td>
      <td><?=$o['order_post_office']?></td>
      <td><?=$o['order_datetime']?></td>


    </tr>
   
  </tbody>
</table>
            </p>
    <table class="table">
  <thead>
    <tr>
      
      <th>Цена</th>
      <th>Название</th>
       <th>Размер</th>
        <th>Цвет</th>
      <th>Количество</th>
      <th>Сумма</th> 
        <th>Время заказа</th> 
        <th>Доп. пожелания</th> 
       </tr>
  </thead>
        <?php foreach($products as $p) : ?>
    <?php
     $price = $price + $p['order_price'];
    ?>
  <tbody>
    <tr>
     
      <td><?=$p['order_price']?></td>
      <td><?=$p['title_ru']?></td>
      <td> <?=$p['order_size']?></td>
        <td> <?=$p['order_color']?></td>
      <td><?=$p['order_quantity']?></td>
      <td><?=$p['order_price']?></td>
        <td><?=$p['order_datetime']?></td>
    <td><?=$p['order_comment']?></td>

    </tr>
   
  </tbody>
        <?php endforeach ?>
</table>
    
        
    <p id="price">Общая цена: <?=$price?> грн</p>
    </div>
    <div class="btn-pos-admin">
        
   </div>
  <?php endforeach ?>  
    </div>
<div id="left-nav">
<ul>
<li><a href="orders.php">Заказы</a></li>
<li><a href="tovar.php">Товары</a></li>
<li><a href="category.php">Категории</a></li>
<li><a href="clients.php">Клиенты</a></li>
</ul>
</div>
</body>
</html>