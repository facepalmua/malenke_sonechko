<div class="top-line-header">
	<ul>
		<li>
			<a href="delivery.php">
				<?=$_LANG["shipping_and_payment"]?></a>
		</li>
		<li>
			<a href="opt.php">
				<?=$_LANG["wholesale_buyers"]?></a>
		</li>

		<li>
			<a href="store.php">
				<?=$_LANG["our_stores"]?></a>
		</li>
		<li>
			<a href="contact.php">
				<?=$_LANG["contacts"]?></a>
		</li>
	</ul>
</div>
<div class="wrapper-header">

	<div class="logo">
		<ul class="float-icon">
			<li>
				<img src="img/logo_old_grey2.png" data-wow-delay="0.6s"  class="wow bounceInDown" height="90px" width="120px"  alt=""></li>

			<li>
				<img src="img/	logo_old_grey2.png" data-wow-delay="0.2s" class="wow bounceInDown"  height="90px" width="120px" alt=""></li>
		</ul>

		<div class="logo2">
			<a href="index.php?lang=<?=$_COOKIE["lang"]?>
				">
				<p>
					<img class="wow slideInRight" src="img/logo.png" height="200px" width="450px" alt=""></p>
			</a>

			<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();

if ($_SESSION["auth"] == "yes_auth" or $_SESSION["auth"] == "yes_auth_wholesaler" ){
    echo '<div class="form-login">
			'.$_LANG["hello"].', <b class="name-size">'.$_SESSION["auth_name"].'</b>
			<!--<button id="exit">Выход</button>
		-->
		<p> <a href="history-orders.php"> История заказов </a> </p>
		<p>
			<a href="" id="exit">'.$_LANG["exit"].'</a>
		</p>
		<div class="cart">
			<p class="wow slideInLeft">
				<a href="cart.php">
					<img src="img/cart.png" width="60" height="50" alt="" />
				</a>
				<span id="cart_price"></span>
			</p>
		</div>
	</div>
	';   
    
}
else{
  echo '
	<div class="form-login">
		<form action="#">
			<p class="wow rubberBand"  data-wow-delay="1.2s">
				<input type="text" name="auth_login" id="auth_login" placeholder="'.$_LANG["login"].'" size="20"></p>
			<p class="wow bounce" data-wow-delay="0.2s">
				<input name="auth_pass" id="auth_pass" type="password" placeholder="'.$_LANG["pass"].'"></p>
			<p id="message-auth">Неверный логин или пароль</p>
			<p class="wow bounce" data-wow-delay="0.0s">
				<a id="button-auth">'.$_LANG["login_b"].'</a>
				<span>/</span>
				<a href="form-registration.php">'.$_LANG["registration"].'</a>
			</p>
		</form>

		<div class="cart">
			<p class="wow slideInLeft">
				<a href="cart.php">
					<img src="img/cart.png" width="60" height="50" alt="" />
				</a>
				<span id="cart_price"></span>
			</p>
		</div>
	</div>
	';   
}

?>
</div>

</div>
<div class="social-icon">
<ul>
	<li>
		<a href="https://vk.com/mal.sonechko" id="social-vk" class="wow bounceInDown" data-wow-delay="0.6s">
			<img   width="90" height="86" />
		</a>
	</li>
	<li>
		<a href="https://ok.ru/malenkesonechko?st._aid=ExternalGroupWidget_OpenGroup" id="social-od" class="wow bounceInDown" data-wow-delay="0.4s">
			<img   height="90" width="90" alt="" />
		</a>
	</li>
	<li>
		<a href="https://www.facebook.com/malsonechko/" id="social-fb" class="wow bounceInDown" data-wow-delay="0.2s">
			<img   height="86" width="90" alt="" />
		</a>
	</li>
</ul>
</div>
<div class="social-icon-small">
<ul>
	<li>
		<a href="https://vk.com/mal.sonechko" id="social-vk-small" class="wow bounceInDown" data-wow-delay="0.6s">
			<img   width="50" height="50"  />
		</a>
	</li>
	<li>
		<a href="https://ok.ru/malenkesonechko?st._aid=ExternalGroupWidget_OpenGroup " id="social-od-small" class="wow bounceInDown" data-wow-delay="0.4s">
			<img   height="50" width="50" alt="" />
		</a>
	</li>
	<li>
		<a href="https://www.facebook.com/malsonechko/" id="social-fb-small" class="wow bounceInDown" data-wow-delay="0.2s">
			<img   height="50" width="50" alt="" />
		</a>
	</li>
</ul>
</div>

<div class="language-icon">
<ul>
	<li>
		<a href="index.php?lang=ua" id="language-ua" class="wow bounceInDown" data-wow-delay="0.6s">UA</a>
	</li>
	<li>
		<a href="index.php" id="language-rus" class="wow bounceInDown" data-wow-delay="0.4s">RU</a>
	</li>
	<li>
		<a href="index.php?lang=en" id="language-en" class="wow bounceInDown" data-wow-delay="0.2s">ENG</a>
	</li>
</ul>
</div>
<div class="search-form-header">
<div class="form-search">
<span id="icon"><i class="fa fa-search"></i></span>
  <input type="text" id="text" class="input-medium search-query" placeholder="<?=$_LANG["Search"]?>">

  <a href="search.php" id="button_search" ><?=$_LANG["Search_b"]?></a>
</div>
</div>
</div>
<div class="header">
<div class="ws-section-container wp new">
<div class="ws-header  new  animated bounceInUp">
	<div id="meganav-position">
		<ul class="meganav">
			<li data-dept="baby" class="">
				<a class="child2" title="Дети от 0 мес. до 2 лет">
					<?=$_LANG["do_2"]?></a>
				<div class="ctnr">
					<ul>
						<li>
							<div class="block-title">
								<?=$_LANG["Look_at_our_collections"]?></div>
							<div class="content-top">
								<ul>
									<li>
										<span class="description">
											Описание проекта
											<img src="img/baby1.jpg" alt="baby" />
											Пижамы для малышей с очаровательными рисунками и яркими узорами.
										</span>
										<a href="colections.php" title="одяг">Colection#1</a>
									</li>
									<li>
										<span class="description">
											Описание проекта
											<img src="img/baby2.jpg" alt="baby" />
										</span>
										<a href="colections.php" title="одяг">Colection#2</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#3</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#4</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#5</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#6</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#7</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#8</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#9</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#10</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#11</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#12</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#13</a>
									</li>
									<li>
										<a href="colections.php" title="одяг">Colection#14</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>

					<div class="content-right">
						<h2>
							<?=$_LANG["Put_your_baby_here"]?></h2>
						<ul>
							<li>
								<a href="tovar.php?category=Maternity_hospital&age=do_2">
									<?=$_LANG["Maternity_hospital"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Blankets&age=do_2">
									<?=$_LANG["Blankets"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Kits&age=do_2">
									<?=$_LANG["Kits_for_baby"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Christening&age=do_2">
									<?=$_LANG["Christening"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Overalls&age=do_2">
									<?=$_LANG["Overalls"]?></a>
							</li>
						</ul>
					</div>
					<div class="content-right-collum">
						<h2>
							<?=$_LANG["Best_for_kids"]?></h2>
						<ul>
							<li>
								<a href="tovar.php?category=Blouse&age=do_2">
									<?=$_LANG["Blouse"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Creepers&age=do_2">
									<?=$_LANG["Creepers"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Underwear&age=do_2">
									<?=$_LANG["Underwear"]?></a>
							</li>
							<li>
								<a href="tovar.php?category=Trivia&age=do_2">
									<?=$_LANG["Trivia"]?></a>
							</li>

						</ul>
					</div>
					<li data-dept="girls" class="">
						<a title="Девочки">
							<?=$_LANG["do_6"]?></a>
						<div class="ctnr">
							<ul>
								<li>
									<div class="block-title">
										<?=$_LANG["Look_at_our_collections"]?></div>
									<div class="content-top">
										<ul>
											<li>
												<span class="description">
													Описание проекта
													<img src="img/baby1.jpg" alt="baby" />
													Пижамы для малышей с очаровательными рисунками и яркими узорами.
												</span>
												<a href="colections.php" title="одяг">Colection#1</a>
											</li>
											<li>
												<span class="description">
													Описание проекта
													<img src="img/baby2.jpg" alt="baby" />
												</span>
												<a href="colections.php" title="одяг">Colection#2</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#3</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#4</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#5</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#6</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#7</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#8</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#9</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#10</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#11</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#12</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#13</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#14</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
							<div class="content-right">
								<h2>
									<?=$_LANG["girls"]?></h2>
								<ul>
									<li>
										<a href="tovar.php?category=For_holiday&age=ot_2&sex=girl">
											<?=$_LANG["For_holiday"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Kits&age=ot_2&sex=girl">
											<?=$_LANG["Kits_for_fashionistas"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Overalls&age=ot_2&sex=girl">
											<?=$_LANG["Overalls"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Blouse&age=ot_2&sex=girl">
											<?=$_LANG["Blouse"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Creepers&age=ot_2&sex=girl">
											<?=$_LANG["Creepers"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Underwear&age=ot_2&sex=girl">
											<?=$_LANG["Underwear"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Caps&age=ot_2&sex=girl">
											<?=$_LANG["Caps"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Trivia&age=ot_2&sex=girl">
											<?=$_LANG["Trivia"]?></a>
									</li>
								</ul>
							</div>
							<div class="content-right-collum">
								<h2>
									<?=$_LANG["boys"]?></h2>
								<ul>
									<li>
										<a href="tovar.php?category=For_holiday&age=ot_2&sex=boy">
											<?=$_LANG["For_holiday"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Kits&age=ot_2&sex=boy">
											<?=$_LANG["Kits_for_fashionistas_b"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Overalls&age=ot_2&sex=boy">
											<?=$_LANG["Overalls"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Blouse&age=ot_2&sex=boy">
											<?=$_LANG["Blouse"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Creepers&age=ot_2&sex=boy">
											<?=$_LANG["Creepers"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Underwear&age=ot_2&sex=boy">
											<?=$_LANG["Underwear"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Caps&age=ot_2&sex=boy">
											<?=$_LANG["Caps"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Trivia&age=ot_2&sex=boy">
											<?=$_LANG["Trivia"]?></a>
									</li>

								</ul>
							</div>
						</div>
					</li>
					<li data-dept="boys" class="">
						<a title="малыши">
							<?=$_LANG["All_for_Kids"]?></a>
						<div class="ctnr">
							<ul>
								<li>
									<div class="block-title">
										<?=$_LANG["Look_at_our_collections"]?></div>
									<div class="content-top">
										<ul>
											<li>
												<span class="description">
													Описание проекта
													<img src="img/baby1.jpg" alt="baby" />
													Пижамы для малышей с очаровательными рисунками и яркими узорами.
												</span>
												<a href="colections.php" title="одяг">Colection#1</a>
											</li>
											<li>
												<span class="description">
													Описание проекта
													<img src="img/baby2.jpg" alt="baby" />
												</span>
												<a href="colections.php" title="одяг">Colection#2</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#3</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#4</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#5</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#6</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#7</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#8</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#9</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#10</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#11</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#12</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#13</a>
											</li>
											<li>
												<a href="colections.php" title="одяг">Colection#14</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
							<div class="content-right">
								<h2>
									<?=$_LANG["Miscellaneous"]?></h2>
								<ul>
									<li>
										<a href="tovar.php?category=Bed_Included_Parts&age=do_2">
											<?=$_LANG["Bed_Included_Parts"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Napkins&age=do_2">
											<?=$_LANG["Napkins"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Beanie&age=do_2">
											<?=$_LANG["Beanie"]?></a>
									</li>
									<li>
										<a href="tovar.php?category=Bibs&age=do_2">
											<?=$_LANG["Bibs"]?></a>
									</li>

								</ul>
							</div>

						</li>
					</div>

				</li>
			</ul>
		</div>

		<script>var meganavURL = "meganav";</script>
		<script src="js/wow.min.js"></script>
		<script>new WOW().init();</script>
	</div>

</div>