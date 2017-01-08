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
	<title>Оптовым покупателям</title>
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
					Если Вас заинтересовала наша продукция и Вы имеете желание работать с нами то эта информация для Вас.
				</p>
				<h2 align="center">Внимание</h2>
				<p>
					Для оптовых покупателей существует отдельный прайс, который Вы получите после регистрации на нашем сайте или у региональных представителей. На сайте указаны <b>розничные цены</b>
					.
				</p>
				<p>
					Мы работаем :понедельник-пятница с 9.00 до18.00 , суббота, воскресенье выходные дни.
				</p>
				<p>
					Если сумма заказа превышает 5000 грн -доставка осуществляется за наш счет. Для оптовых покупателей со всех городов Украины мы осуществляем отправку товара автотранспортными компаниями Украины. Минимальная сумма заказа 3000 грн.
				</p>
				<p >
					Если Вас интересует открытие магазина ТМ "Маленьке СОНЕЧКО"  присылайте нам предложения на наш адрес mal_sonechko@mail.ru.
				</p>
				<p align="center">С уважением компания "Маленьке СОНЕЧКО"!</p>

			</div>
			<?php
		include("footer.php");
	?></div>

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
</body>
</html>