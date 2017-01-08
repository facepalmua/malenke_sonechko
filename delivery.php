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
		<title>Доставка</title>

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
		<?php
		include("views/header.php");
	?>
		<div class="wrapper-for-footer">
			<div class="delivery">
				<p>
					Доставку по территории Украины осуществляем любыми службами доставки.
				</p>
				<p>
					Приоритет отдаём следующим компаниям "Новая почта" и "Деливери". Заказы, оплаченные до 14.00 отправляются в тот же день (службу доставки и отделение почты указывайте в заказе). Сроки отгрузки с момента заказа 1 сутки при наличии заказанного товара.
				</p>
				<p>
					Отправка товара осуществляется после 100% оплаты на счёт в ПриватБанке.
				</p>
				<p>
					Если Вам страшно отправлять предоплату, возможна отправка наложенным платежом. При этом Вам прийдется заплатить % от стоимости заказа на службе доставке, за пересылку денег.
				</p>
				<p id="align-center">Для заказа товара с отправкой по Украине необходимо:</p>
				<ol>
					<li>
						*Получить от нас счет для оплаты выбранного Вами товара (без стоимости доставки);
					</li>
					<li>*Оплатить заказ согласно счета в ближайшем отделении банка;</li>
					<li>
						*После поступления денег на наш счет, мы отправляем товар в Ваш город через удобную Вам службу доставки и сообщаем номер декларации, дату прибытия посылки и адрес где ее получить (с паспортом) в Вашем городе.
					</li>
				</ol>
			</div>
			<?php
		include("footer.php");
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