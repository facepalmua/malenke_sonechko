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
	<title>Колекции</title>

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
		<div class="img-collection">
			<a href="colections.php">
				<div id="back-button" ></div>
			</a>
			<img src="img/colection_img.png" alt="" usemap="#Map" />
			<map name="Map" id="Map">

				<area alt="" title="" href="#" shape="poly" coords=""  />

				<area alt="" title="" href="#" shape="poly" coords="" />
				<area alt="" title="" href="#" shape="poly" coords="739,339,754,612,930,609,932,332" />
				<area  href="http://malsontest.dp.ua/product.php?id=36" shape="poly" coords="1,3,2,654,481,654,481,2" data-hasqtip="2" oldtitle="Tail feathers" title="комбинезон в виде Санта-Клауса (0 мес. - 2 лет)
475,00 грн - 506,00 грн Красно-бежевая шапка помпоном (0 мес. - 2 лет)
158,00 грн"  aria-describedby="qtip-2">
				<area href="http://malsontest.dp.ua/product.php?id=36" shape="poly" coords="753,41,762,302,928,303,927,43" data-hasqtip="2" oldtitle="Tail feathers" title="506,00 грн Красно-бежевая шапка помпоном (0 мес. - 2 лет)
158,00 грн"  aria-describedby="qtip-2">
				<area href="http://malsontest.dp.ua/product.php?id=36" shape="poly" coords="517,22,518,300,722,302,718,33,758,38" data-hasqtip="2" oldtitle="Tail feathers" title="комбинезон в виде Санта-Клауса (0 мес. - 2 лет)
475,00 грн - 506,00 грн Красно-бежевая шапка помпоном (0 мес. - 2 лет)
158,00 грн"  aria-describedby="qtip-2">
				<area  href="http://malsontest.dp.ua/product.php?id=36" shape="poly" coords="514,316,519,625,724,618,714,336" data-hasqtip="2" oldtitle="Tail feathers" title="комбинезон в виде Санта-Клауса (0 мес. - 2 лет)

158,00 грн"  aria-describedby="qtip-2"></map>
			<a href="colections.php">
				<div id="next-button" ></div>
			</a>
		</div>
		<div class="bottom-collections">
			<ul>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
				<li>
					<a href="colections.php">
						<img src="img/220.jpg" alt=""></a>
				</li>
			</ul>
		</div>
		<?php
		include("footer.php");
	?></div>

	<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

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