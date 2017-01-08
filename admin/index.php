<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/style.css">
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
			<p align="right">
				<a href="administrators.php" >Администраторы</a>
				|
				<a href="?logout">Выход</a>
			</p>
			<p align="right">
				Вы -
				<span>Администратор</span>
			</p>
		</div>

	</div>

	<div id="left-nav">
		<ul>
			<li>
				<a href="orders.php">Заказы</a>
			</li>
			<li>
				<a href="tovar.php">Товары</a>
			</li>
			<li>
				<a href="slider.php">Слайдер</a>
			</li>
			<li>
				<a href="clients.php">Клиенты</a>
			</li>
		</ul>
	</div>
</body>
</html>