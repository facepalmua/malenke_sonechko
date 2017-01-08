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
	<title>Контакты</title>
	<link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" href="css/style-footer.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<?php
        include("views/header.php");
		?>
	<div class="wrapper-for-footer store-margin">
		<div id="container">

			<h1>
				<span> <i></i>
					Наше местонахождение
				</span>
			</h1>
			<div class="clr"></div>
			<div class="text-info">
				<div class="mapblock">
					<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=xcJV4qmeixdGyd7mhPtuCK0dzrYonFOI&width=930&height=400&lang=uk_UA"></script>
				</div>
			</div>
			<div class="clr"></div>

			<h1>
				<span> <i></i>
					Контакты
				</span>
			</h1>
			<div class="clr"></div>
			<div class="anons-main">
				<div>
					<h2>Директора:</h2>
					<ul>
						<li> <strong>Войко Наталия</strong>
						</li>
						<li> <strong>Войко Александр</strong>
						</li>
					</ul>
					<h2>Менеджер</h2>
					<ul>
						<li>
							<strong>Мак Ольга</strong>
						</li>
						<li>тел. + 38 (098) 462 58 68</li>
						<li>тел. + 38 (0382) 719 156</li>
						<li>тел. +38 (063) 535 48 08</li>
						<li>
							email:
							<a href="mailto:zakaz@malenkesonechko.com">zakaz@malenkesonechko.com</a>
						</li>
					</ul>
					<h2>Представительство в Черкасской и Кировоградской областях</h2>
					<ul>
						<li>
							<strong>Найчук Вадим</strong>
						</li>
						<li>тел. + 38 (067) 240 24 15</li>
						<li>
							email:
							<strong><a href="mailto:dynyavip.ru@rambler.ru">dynyavip.ru@rambler.ru</a></strong> 
						</li>
					</ul>
					<h2>Представительство в Киевской области</h2>
					<ul>
						<li>
							<strong>"Трикотажный Всесвит"</strong>
						</li>
						<li>тел. + 38 (097) 362 44 03</li>
						<li>тел. + 38 (050) 148 73 58</li>
						<li>тел. + 38 (093) 836 15 26</li>
						<li>
							email:
							<a href="mailto:magazin@kyivpuls.com">magazin@kyivpuls.com</a>
						</li>
					</ul>
					<h2>
						Представительство в Харьковской, Луганской, Донецкой областях
					</h2>
					<ul>
						<li>
							<strong>Хардина Оксана</strong>
						</li>
						<li>тел. + 38 (050) 404 18 44</li>
						<li>тел. + 38 (050) 304 32 62</li>
						<li>тел. + 38 (067) 532 49 26</li>
						<li>
							email:
							<a href="mailto:zakaz_intex@ukr.net">zakaz_intex@ukr.net</a>
						</li>
					</ul>
					<h2>Представительство в Одесской области</h2>
					<ul>
						<li>
							<strong>Даценко Светлана</strong>
						</li>
						<li>тел. + 38 (067) 483 70 44</li>
						<li>
							email:
							<a href="mailto:sonechko80-80@mail.ru">sonechko80-80@mail.ru</a>
						</li>
					</ul>
					<h2>Представительство в Николаевской области</h2>
					<ul>
						<li>
							<strong>Анна</strong>
						</li>
						<li>тел. + 38 (093) 901 65 10</li>
						<li>тел. + 38 (050) 493 96 87</li>
						<li>
							email:
							<a href="mailto:missonechko@yandex.ru">missonechko@yandex.ru</a>
						</li>
					</ul>
					<h2>Представительство в Винницкой области</h2>
					<ul>
						<li>
							<strong>Сергей (опт, розница)</strong>
						</li>
						<li>тел. + 38 (096) 416 04 02</li>
						<li>
							email:
							<a href="mailto:sergey.martyniuck@yandex.ru">sergey.martyniuck@yandex.ru</a>
						</li>
					</ul>
					<h2>Представительство в Закарпатской области</h2>
					<ul>
						<li>
							<strong>Попович Александр</strong>
						</li>
						<li>тел. + 38 (066) 054 79 44</li>
						<li>тел. + 38 (096) 401 06 09</li>
						<li>
							email:
							<a href="mailto:svitopt@mail.ua">svitopt@mail.ua</a>
						</li>
					</ul>
					<h2>Представительство в Житомирской области</h2>
					<ul>
						<li>
							<strong>ул. Киевская 87, "Трикотажный всесвит"</strong>
						</li>
						<li>тел. +38 (097) 114 01 97</li>
					</ul>
					<h2>Представительство в Сумской и Черниговской областях</h2>
					<ul>
						<li>
							<strong>Болшук Ирина</strong>
						</li>
						<li>тел. + 38 (099) 055 09 80</li>
						<li>тел. + 38 (050) 305 78 17</li>
						<li>
							email:
							<a href="mailto:intex-sumy@ukr.net">intex-sumy@ukr.net</a>
						</li>
					</ul>
					<h2>Представительство в Полтавской области</h2>
					<ul>
						<li>
							<strong>Хардина Елена</strong>
						</li>
						<li>тел. + 38 (099) 556 77 06</li>
						<li>тел. + 38 (068) 155 15 88</li>
						<li>тел. + 38 (050) 346 42 66</li>
						<li>
							email:
							<a href="mailto:intex-pl@ukr.net">intex-pl@ukr.net</a>
						</li>
					</ul>
					<h2>Представительство в Запорожской области</h2>
					<ul>
						<li>
							<strong>Буряк Александра</strong>
						</li>
						<li>тел. + 38 (066) 922 03 62</li>
						<li>тел. + 38 (098) 492 03 73</li>
						<li>тел. + 38 (050) 346 42 66</li>
						<li>
							email:
							<a href="mailto:intex-zp@ukr.net">intex-zp@ukr.net</a>
						</li>
					</ul>
					<h2>Представительство в Херсонской и Одесской областях</h2>
					<ul>
						<li>
							<strong>Василенко Светлана</strong>
						</li>
						<li>тел. + 38 (095) 941 06 26</li>
						<li>тел. + 38 (067) 533 30 40</li>
						<li>
							email:
							<a href="mailto:intex-mk@ukr.net">intex-mk@ukr.net</a>
						</li>
					</ul>
					<h2>Представительство в Кировоградской и Черкасской областях</h2>
					<ul>
						<li>
							<strong>Ткаченко Юлия</strong>
						</li>
						<li>тел. + 38 (066) 354 52 44</li>
						<li>тел. + 38 (067) 402 14 14</li>
						<li>тел. + 38 (050) 346 42 66</li>
						<li>
							email:
							<a href="mailto:intex-kr@ukr.net">intex-kr@ukr.net</a>
						</li>
					</ul>
					<h2>Представительство в Ивано-Франковской области</h2>
					<ul>
						<li>
							<strong>Нина</strong>
						</li>
						<li>тел. + 38 (067) 340 62 38</li>
						<li>
							email:
							<a href="mailto:gurt@darsi.if.ua">gurt@darsi.if.ua</a>
						</li>
					</ul>
					<h2>Представительство в Хмельницкой области</h2>
					<ul>
						<li>
							<strong>"Чадо"</strong>
						</li>
						<li>тел. + 38 (067) 382 56 12</li>
						<li>
							email:
							<a href="mailto:mihailov.mihail@mail.ru">mihailov.mihail@mail.ru</a>
						</li>
					</ul>

				</div>

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