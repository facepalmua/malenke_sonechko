<?php
    error_reporting(E_ALL & ~E_NOTICE);
    include("include/db_connect.php");
    include("models/products.php");
    
    $link = db_connect();
    $products = new_products($link);
    setcookie("lang","ru",time()+3600);
    $lang = "ru";
    if ((isset($_GET["lang"]))&&($_GET["lang"] == "en")) {
        $lang = "en";
        setcookie("lang","en",time()+3600);
    }
    elseif ((isset($_GET["lang"]))&&($_GET["lang"] == "ua")) {
        $lang = "ua";
        setcookie("lang","ua",time()+3600);
    } 
    include('languages/' .$lang. '.php');
    /*if (isset($_COOKIE["lang"])) {    
        include('languages/' .$_COOKIE["lang"]. '.php');
    }*/
?>

<!DOCTYPE html >
<title>Маленьке Сонечко</title>
<meta name="description" content="ТМ &quot;Маленьке Сонечко&quot; - детская одежда от украинского производителя по доступным ценам оптом и в розницу. 
Доставка по всей Украине.
тел. +38 (098) 462-58-68
email: zakaz@malenkesonechko.com
Одежда для новорожденных от украинского производителя ТМ &quot;Маленьке Сонечко&quot;
тел. +38 (098) 462-58-68
email: zakaz@malenkesonechko.com">
<meta name="keywords" content="Маленьке Сонечко" />
<meta property="og:title" content="Маленьке Сонечко">
<meta name="yandex-verification" content="80419f573a6e0671" />
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Bootstrap/styles/bootstrap.min.css"  />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" href="css/style-footer.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="js/snowstorm.js"></script>
<style type="text/css"></style>
<meta name="yandex-verification" content="80419f573a6e0671" />

<script type="text/javascript">

<!-- // blue-ish snow!?
snowStorm.snowColor = '#fff';

// append the snow to this element (by ID or direct DOM node reference)
snowStorm.targetElement = 'snow-target'; 

</script>


</head>

<body>

<div class="wrapper-for-footer">
	<div id="position-page">
		<div id="snow-target">
			<?php
        include("views/header.php");
		?>

			<div style="padding:0px 0.5em"></div>

		</div>
		<div class="container">
			<div class="row otstup">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<a href="https://vk.com/zaharchyshyn">
									<img src="img/for-slider-960x640.jpg" alt="..."></a>
								<div class="carousel-caption">
<!--
									<h3>Новинки</h3>
									<p>Не пропустите!</p>
-->
								</div>
							</div>
                            
                            <?php
                                $query = "SELECT * FROM slider  ORDER BY slider_datetime DESC LIMIT 5";
                                $result = mysqli_query($link, $query);

                                if(!$result)
                                    die(mysqli_error($link));

                                $n = mysqli_num_rows($result);
                                $slider = array();

                                for($i = 0; $i < $n; $i++){
                                    $row = mysqli_fetch_assoc($result);
                                    $slider[] = $row;
                                }
                            ?>
                            <?php foreach($slider as $s) : ?>
                                <div class="item">
                                    <a href="product.php?id=<?=$s['product_id']?>">
                                        <img src="<?=$s['img']?>" alt="..."></a>
                                    <div class="carousel-caption">


                                    </div>
                                </div>
                            <?php endforeach ?>

							

						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>

				</div>
			</div>
		</div>
		<p id="success_message"></p>
		<div class="news-block">
			<h2>
				<?=$_LANG["novelty"]?></h2>
			<?php foreach($products as $p) : ?>
			<div class="content">

				<div class="grid">

					<?php 
                                if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
                                    $price = $p['price'];
                                    $price_wholesale = $p['price_wholesale'];
                                    echo'<b class="price-position">'.$_LANG["retail_price"].': '.$price.' UAH
					<br>'.$_LANG["Wholesale_price"].': '.$price_wholesale.' UAH</b>
				';
                                }
                                else {
                                    $price = $p['price'];
                                    echo' <b class="price-position">'.$price.' UAH</b>
				';
                                }
                            ?>
				<figure class="effect-chico">
					<a href="product.php?id=<?=$p['products_id']?>
						">
						<img src="img/products/<?=$p['image']?>
						" alt="">
						<figcaption>
							<p>
								<?=$_LANG["Add_to_Basket"]?>
								<img id="cart-white"  src="img/cart_white.png" alt="cart">
								<?=$p['title_'.$lang.'']?>
								<br> <b><?=$p['price']?>UAH</b>
							</p>
						</figcaption>
					</a>
				</figure>

			</div>

			<!--  </div>--></div>

		<?php endforeach ?></div>
	<?php
            $query = "SELECT * FROM reviews  ORDER BY RAND() LIMIT 3";
        
            $result = mysqli_query($link, $query);

            if(!$result)
                die(mysqli_error($link));

            $n = mysqli_num_rows($result);
            $reviews = array();

            for($i = 0; $i < $n; $i++){
                $row = mysqli_fetch_assoc($result);
                $reviews[] = $row;
            }
        ?>
	 <h2>
	<?=$_LANG["Customer_Reviews"]?></h2>
<div class="reviews">

	<?php foreach($reviews as $r) : ?>
	<div class="otzyv otzyv1">
		<section class="main">

			<div class="mb-wrap mb-style-2">
				<blockquote cite="http://www.gutenberg.org/ebooks/11">
					<p>
						<?=$r["reviews"]?></p>
				</blockquote>
				<div class="mb-attribution">
					<p class="mb-author">
						<?=$r["reviews_name"]?></p>

				</div>
			</div>

		</section>
	</div>
	<?php endforeach ?></div>

<div class="footer">
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
<script type='text/javascript'>var aaSnowConfig = {snowflakes: '200'}; </script>
</div>

</div>

<p>
All right reserved. Malenkesonechko.com 2016.
</p>
</body>
</html>