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
	<title>Наши магазины</title>
	<link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
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
		<div class="inc">
			<div id="content">
				<h1>
					<span> <i></i>
						Местонахождение магазинов
					</span>
				</h1>
				<div class="clr"></div>
				<div class="text-info">
					<div class="mapblock">
						<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=fyIlEdCRthjjfyEG8kSPyHf-0_1ldgdr&width=930&height=400"></script>
					</div>
				</div>
				<div class="clr"></div>

				<h1>
					<span> <i></i>
						Наши магазины
					</span>
				</h1>
				<div class="clr"></div>
				<div class="text-info">
					<h2>Менеджер</h2>
					<ul>
						<li>
							<span style="font-size:16px;"> <strong>Мак Ольга</strong>
							</span>
						</li>
						<li>
							<span style="font-size:16px;">тел. + 38 (098) 462 58 68</span>
						</li>
						<li>
							<span style="font-size:16px;">тел. + 38 (0382) 719 156</span>
						</li>
						<li>
							<span style="font-size:16px;">тел. +380 (063) 535 48 08</span>
						</li>
						<li>
							<span style="font-size:16px;">
								email:&nbsp;
								<a href="mailto:zakaz@malenkesonechko.com">zakaz@malenkesonechko.com</a>
							</span>
						</li>
					</ul>
					<p>&nbsp;</p>
					<h2>
						<span style="font-size:18px;">
							"Маленьке СОНЕЧКО" г.&nbsp; <strong>Хмельницкий улица Геологов 3</strong>
						</span>
					</h2>
					<ul>
						<li>
							<span style="font-size:16px;">тел. +38 (097) 488 64 14&nbsp;</span>
						</li>
					</ul>
					<p>
						<strong><span style="font-size:16px;">
								​
								<img alt="" src="http://malenkesonechko.com/image/data/news/6629f75011befc05731889e8c641fccdf4cce8e133af2402379dad732fd9da04.jpg" style="width: 600px; height: 338px;" />
							</span></strong> 
					</p>
					<h2>
						<strong><span style="font-size:18px;">
								"Маленьке СОНЕЧКО" г.&nbsp;Хмельницкий улица Н. Береговая 42/1, 1 этаж ТЦ
							</span>
							<span style="font-size:20px;">&nbsp;</span></strong> 
						<span style="font-size: 20px; line-height: 19.006px; color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;">"EL"</span>
					</h2>
					<p>
						<strong>
							<span style="font-size: 16px;">
								&nbsp;
								<img alt="" src="http://malenkesonechko.com/image/data/news/IMG_4684.jpg" style="width: 400px; height: 600px;" />
							</span>
						</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Винница</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. 50 - летия победы, ТЦ "Варшава"</span>
							</strong>
						</li>
						<li>
							<span style="font-size: 16px;">тел.&nbsp;38 (096) 416 04 02&nbsp;</span>
						</li>
					</ul>
					<p>
						<span style="font-size: 16px;">Розничный отдел</span>
					</p>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/269da9952ad5a130ae729b3ec688e6ed6c20095d36769af03edc9e2edd457b6b.jpg" style="width: 1003px; height: 188px;" />
						</strong>
					</p>
					<p>
						<span style="font-size:16px;">Оптовый отдел</span>
					</p>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/57929bf22ba2c293f7a2a16b845b620d0041d45750cbcf1ebabe1421c610e451.jpg" style="width: 1000px; height: 168px;" />
						</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Винница</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Матроса Кошки 9/2</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/4c3de5667a9863a07838894ca884bd2836f8a5eb9d97f7298fde010f272faac0.jpg" style="width: 1003px; height: 216px;" />
						</strong>
					</p>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/6ed26a86d4fe30fb3bc8b38ab51ce26993f165b28c7bdced360f4c8ea58fddc0.jpg" style="width: 1005px; height: 270px;" />
						</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Чернигов</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. 77-й Гвардейской дивизии, 1а, ТРЦ "HOLLYWOOD"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/OpenShop040915/b101644bda0e0a88badc6fec20bb61170e0fea371f21d7ef4e29d06e3269533f.jpg" style="width: 1004px; height: 305px;" />
						</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Киев</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Крайняя, 1, ТК "Альтаир", магазин "Трикотажный всесвит"</span>
							</strong>
						</li>
					</ul>
					<p>
						<span style="font-size:16px;">​Оптовый отдел</span>
					</p>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/Kiev opt2.jpg" style="width: 1003px; height: 311px;" />
						</strong>
					</p>
					<p>
						<strong>
							<img alt="" src="http://malenkesonechko.com/image/data/news/Kiev opt3.jpg" style="width: 1002px; height: 325px;" />
						</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Луцк</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Конякина 18а, оптовик "Райдуга"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Жмеринка</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Центральная 8, 3 этаж "Универмаг"</span>
							</strong>
						</li>
					</ul>
					<p>
						<span style="font-size: 16px;">​</span>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Каменец - Подольск</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:18px;">
									<span style="font-size:16px;">
										<span style="font-size:18px;">
											<span style="font-size:16px;">ул. Соборная 12, магазин "Карапуз"</span>
										</span>
									</span>
								</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Очаково</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Луначарского, "ЦУМ"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Верховина</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. И. Франка, магазин "Гармония"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Хуст</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Гвардейская 1А, магазин "Владушка"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Могилёв - Подольск</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Рыночная, напротив магазина "Лаванда"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Радомышль</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Соборная площадь 10, магазин "BABY" 2 этаж</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Залещики</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. С. Бандеры 27, магазин "Детский мир"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Ровно</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Киевская 44, магазин "Мамина деточка"</span>
							</strong>
						</li>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Соборная 271, магазин "Мамина деточка"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Кременчуг</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Цюрупы 22/6, магазин "Топ - Топ"</span>
							</strong>
						</li>
					</ul>
					<p>
						<strong>&nbsp;</strong>
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Житомир</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Киевская 87, "Трикотажный всесвит"</span>
							</strong>
						</li>
						<li>
							<span style="font-size:16px;">тел. (0412) 51 23 73</span>
						</li>
					</ul>
					<p>
						<span style="font-size: 16px;">Оптовый отдел</span>
					</p>
					<p>
						<img alt="" src="http://malenkesonechko.com/image/data/news/Jitomir opt2.jpg" style="width: 1004px; height: 291px;" />
					</p>
					<p>
						<img alt="" src="http://malenkesonechko.com/image/data/news/Jitomir opt5.jpg" style="width: 1003px; height: 286px;" />
					</p>
					<p>
						<span style="font-size: 16px;">​Розничный отдел</span>
					</p>
					<p>
						<img alt="" src="http://malenkesonechko.com/image/data/news/Jitomir opt6.jpg" style="height: 202px; width: 1002px;" />
					</p>
					<h2>
						<strong>
							<span style="font-size:18px;">Ужгород</span>
						</strong>
					</h2>
					<ul>
						<li>
							<strong>
								<span style="font-size:16px;">ул. Собранецкая 138</span>
							</strong>
						</li>
						<li>
							<span style="font-size:16px;">тел. (096) 401 06 09</span>
						</li>
						<li>
							<span style="font-size:16px;">тел. (066) 054 79 44</span>
						</li>
						<li>
							<span style="font-size:16px;">email: svitopt@mail.ua</span>
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