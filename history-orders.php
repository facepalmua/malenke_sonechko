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
<body>
	<!DOCTYPE html>
	<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>История заказов</title>

		<link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="css/style-footer.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="qtipe/jQuery.js"></script>
		<script type="text/javascript" src="qtipe/qtip.js"></script>

</head>
<body>
<!--
		<?php
            session_start();
		//include("views/header.php");
	?>
-->
		<div class="wrapper-for-footer">
			<div class="history-orders">
				<h1>История заказов</h1>
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
      <th>Время</th>
       </tr>
  </thead>
      
       <?php 
            include("include/db_connect.php");
            $link = db_connect();
            $login = $_SESSION["auth_login"];
            $result = mysqli_query($link, "SELECT * FROM orders,products WHERE products.products_id = orders.order_id_product AND order_login='$login' ORDER BY order_datetime DESC");
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
  <tbody>
    <tr>
     
      <td><?=$o['order_price']?></td>
      <td><?=$o['title_ru']?></td>
      <td><?=$o['order_size']?></td>
      <td><?=$o['order_color']?></td>
      <td><?=$o['order_quantity']?></td>
      <td><?=$o['order_quantity']*$o['order_price']?></td>
      <td><?=$o['order_comment']?></td>
      <td><?=$o['order_datetime']?></td>

    </tr>
   
  </tbody>
<?php endforeach ?>
</table>		
			</div>
			<?php
		//include("footer.php");
	?></div>
		<script>

<script src="js/headhesive.js"></script>
		<script src="js/headhesive_my.js"></script>

		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/modernizr.custom.13303.js"></script>
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/shop_script.js"></script>
		<script src="js/header.js"></script>
		<script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
		<script>var meganavURL = "meganav"</script>
		<script src="js/wow.min.js"></script>
		<script>new WOW().init();</script>
		<script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.slicebox.js"></script>
		<script src="js/footer.js"></script>
		<script src="js/jquery.cookie.js" type="text/javascript"></script>
	</script>
</body>
</html>
</body>
</html>