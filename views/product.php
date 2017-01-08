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
    <title><?=$product['title_'.$_COOKIE["lang"].'']?></title>
    <meta name="description" content="<?=$product['title_'.$_COOKIE['lang'].'']?> ТМ &quot;Маленьке Сонечко&quot; - детская одежда от украинского производителя
email: zakaz@malenkesonechko.com
Одежда для новорожденных от украинского производителя ТМ &quot; Маленьке Сонечко &quot;
тел. +38 (098) 462-58-68
email: zakaz@malenkesonechko.com">
<meta name="keywords" content="<?=$product['title_'.$_COOKIE['lang'].'']?> Маленьке Сонечко" />
<meta property="og:title" content="<?=$product['title_'.$_COOKIE['lang'].'']?> Маленьке Сонечко">
    
    <link href="Bootstrap/styles/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <script type="text/javascript" src="js/catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
   <!--  <script src="js/jquery-1.8.2.min.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>  --> 
    <script src="js/header.js"></script>
    <script src="js/jquery-ui-1.8.EasingOnly.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/shop_script.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">  
    <link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" type="text/css" href="js/catalog/view/javascript/jquery/colorbox/colorbox.css" media="screen" />

<script type="text/javascript" src="js/catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js"></script>
<link href="js/catalog/view/theme/default/stylesheet/cloud-zoom.css" rel="stylesheet" type="text/css" />
<script src="js/catalog/view/javascript/cloud-zoom.1.0.3.min.js"></script>

</head>
<body>

  <?php
        include("views/header.php");
   ?>
  <div class="wrapper-for-footer">  
<div class="wrapper-tovar">  
<div class="pos-wrapper">
 <div class="product-info">

        <div class="info-left">
            <div class="image">
                <!-- велика картинка при наведенні -->
                <a href="img/products/<?=$product['image']?>"  title="Комплект Звездочки" class="cloud-zoom" rel="position: 'inside' ,showTitle: false, adjustX:0, adjustY:0, tint:'#ffffff', tintOpacity:0.2, zoomWidth:360," id="zoom1">
                    <!-- картинка яка відображається відразу --> 
                    <img src="img/products/<?=$product['image']?>" alt="Комплект Звездочки" id="image" height="400px" width="300px" />
                </a>
                <!-- підгружається при кліку --> 
                <a href="img/products/<?=$product['image']?>" class="colorbox icon-zoomin" rel="colorbox"></a>
            </div>
            <div class="image-additional">
                <!-- підгружається при кліку -->
                 <a href="img/products/<?=$product['image']?>" title="Комплект Звездочки" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: 'img/products/<?=$product['image']?>' ">
                    <!-- нижній ряд картинок --> <img src="img/products/<?=$product['image']?>" title="Комплект Звездочки" alt="Комплект Звездочки" height="128px" width="96px" />
                </a>
                <!--   КАРТИНКА ДВА   -->
                <!-- підгружається при кліку --> 
                
                <?php
                    if($product['image2'] != ""){
                        echo '<a href="img/products/'.$product['image2'].'"  title="Комплект Звездочки" class="cloud-zoom-gallery" rel="useZoom: \'zoom1\', smallImage: \'img/products/'.$product['image2'].'\'  ">
                        <img src="img/products/'.$product['image2'].'" title="Комплект Звездочки" alt="Комплект Звездочки" height="128px" width="96px"/><!-- нижній ряд картинок -->
                        </a>';
                    }
                    if($product['image3'] != ""){
                        echo '<a href="img/products/'.$product['image3'].'"  title="Комплект Звездочки" class="cloud-zoom-gallery" rel="useZoom: \'zoom1\', smallImage: \'img/products/'.$product['image3'].'\'  ">
                        <img src="img/products/'.$product['image3'].'" title="Комплект Звездочки" alt="Комплект Звездочки" height="128px" width="96px"/><!-- нижній ряд картинок -->
                        </a>';
                    }
                   
                    if($product['image4'] != ""){
                        echo '<a href="img/products/'.$product['image4'].'"  title="Комплект Звездочки" class="cloud-zoom-gallery" rel="useZoom: \'zoom1\', smallImage: \'img/products/'.$product['image4'].'\'  ">
                        <img src="img/products/'.$product['image4'].'" title="Комплект Звездочки" alt="Комплект Звездочки" height="128px" width="96px"/><!-- нижній ряд картинок -->
                        </a>';
                    }
                   
                   if($product['image5'] != ""){
                        echo '<a href="img/products/'.$product['image5'].'"  title="Комплект Звездочки" class="cloud-zoom-gallery" rel="useZoom: \'zoom1\', smallImage: \'img/products/'.$product['image5'].'\'  ">
                        <img src="img/products/'.$product['image5'].'" title="Комплект Звездочки" alt="Комплект Звездочки" height="128px" width="96px"/><!-- нижній ряд картинок -->
                        </a>';
                    }
                   if($product['image6'] != ""){
                        echo '<a href="img/products/'.$product['image6'].'"  title="Комплект Звездочки" class="cloud-zoom-gallery" rel="useZoom: \'zoom1\', smallImage: \'img/products/'.$product['image6'].'\'  ">
                        <img src="img/products/'.$product['image6'].'" title="Комплект Звездочки" alt="Комплект Звездочки" height="128px" width="96px"/><!-- нижній ряд картинок -->
                        </a>';
                    }
                ?>
                
            </div>
        </div>
    </div>

<div class="description-product-position">

<div class="description-product">
    <p class="description-product-name"><b class="font-size-name"><?=$product['title_'.$_COOKIE["lang"].'']?> (<?=$product['code']?>)</b></p>
    <p id="color"><?=$product['color_ru']?> </p>
    <?php
        if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
            $price = $product['price'];
            $price_wholesale = $product['price_wholesale'];
            echo'<p> '.$_LANG["retail_price"].': '.$price.' UAH<br> '.$_LANG["Wholesale_price"].': '.$price_wholesale.' UAH</b>
            <p>В наличии есть <span id="quantity_p">'.$product['quantity'].'</span> уп. <br>
            Количество товаров в упаковке: <span id="quantity_p">'.$product['pieces_per_pack'].'</span> шт.</p>';
        }
        else {
            $price = $product['price'];
            echo'<p> <span>'.$_LANG["price"].' </span><b>'.$price.'</b> UAH</p>';
        }
    ?>
    
        <?php
            if ($product['r1']!=""){
                echo '<p><input type="button" data-placement="right" id="hide" data-toggle="tooltip" title="'.$_LANG["size_table"].'">
    <input type="button" id="show" data-toggle="tooltip" data-placement="right" title="Таблица размеров" ></p>

    <p><select id="size">';
            
            if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
                echo'<option value="УПАКОВКА">'.$_LANG["size"].'</option>
                ';
            }
            else {
                echo'<option value="">'.$_LANG["size"].'</option>';
            }
                $size = explode(" ", $product['r1']);
                $price_for_size = explode(" ", $product['price_for_size']);
                $price = $price_for_size[0];
                foreach($size as $s) {
                    echo '<option value="'.$s.'|'.$price.'">'.$s.' - '.$price.' UAH</option>';
                    $price = next($price_for_size);
                }
             
            }
        ?>
        
        

        </select>
         <p><select class="select-color">
             <?php
                $color = explode(" ", $product['color_'.$_COOKIE["lang"].'']);
                foreach($color as $c) {
                    echo '<option value="'.$c.'">'.$c.'</option>';
                }
             ?>
 
</select></p>
       <p><?=$_LANG["quantity"]?></p> <p id="imput-cart-size"> <span id="plus"></span><input type="text" name="quantity" id="quantity" placeholder="" value="1" ><span id="minus"></span></p>
    </p>
  
  <p><input type="button" id="cart_add"  data-wow-delay="0.2s" class="btn btn-success wow pulse messageList" value="<?=$_LANG["Add_to_cart"]?>"  > </p>
    
  <p class="position-justify"><?=$product['description_'.$_COOKIE["lang"].'']?></p>
    <p><textarea  rows="5" cols="50" id="comment" name="comment" placeholder="<?=$_LANG["additional_comments"]?>"></textarea></p>
  </div>

  </div>

  </div> 
    <p id="cart_message"></p>
    <p id="size_message"></p>
<div class="table-hide">   <input type="button" name="" id="close-table"> <table class="table  table-bordered   table-position>
    <colgroup>
        <col width="85*" />
        <col width="85*" />
        <col width="85*" />
    </colgroup>
    <tbody class="table-position">
        <tr valign="TOP" class="success">
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    Рост</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    Обхват груди</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    Возраст</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="50" width="33%">
                <p align="CENTER" lang="ru-RU">
                    50</p>
            </td>
            <td sdnum="1058;" sdval="38" width="33%">
                <p align="CENTER" lang="ru-RU">
                    38</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    0-1 месяц</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="56" width="33%">
                <p align="CENTER" lang="ru-RU">
                    56</p>
            </td>
            <td sdnum="1058;" sdval="40" width="33%">
                <p align="CENTER" lang="ru-RU">
                    40</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    1-2 месяца</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="62" width="33%">
                <p align="CENTER" lang="ru-RU">
                    62</p>
            </td>
            <td sdnum="1058;" sdval="42" width="33%">
                <p align="CENTER" lang="ru-RU">
                    42</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    2-3 месяца</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="68" width="33%">
                <p align="CENTER" lang="en-US">
                    68</p>
            </td>
            <td sdnum="1058;" sdval="44" width="33%">
                <p align="CENTER" lang="en-US">
                    44</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    3-6 месяцев</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="74" width="33%">
                <p align="CENTER" lang="en-US">
                    74</p>
            </td>
            <td sdnum="1058;" sdval="46" width="33%">
                <p align="CENTER" lang="en-US">
                    46</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    6-9 месяцев</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="80" width="33%">
                <p align="CENTER" lang="en-US">
                    80</p>
            </td>
            <td sdnum="1058;" sdval="48" width="33%">
                <p align="CENTER" lang="en-US">
                    48</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    9-12 месяцев</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="86" width="33%">
                <p align="CENTER" lang="en-US">
                    86</p>
            </td>
            <td sdnum="1058;" sdval="50" width="33%">
                <p align="CENTER" lang="en-US">
                    50</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    1-1,5 года</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="92" width="33%">
                <p align="CENTER" lang="en-US">
                    92</p>
            </td>
            <td sdnum="1058;" sdval="52" width="33%">
                <p align="CENTER" lang="en-US">
                    52</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    1,5-2 года</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="98" width="33%">
                <p align="CENTER" lang="en-US">
                    98</p>
            </td>
            <td sdnum="1058;" sdval="54" width="33%">
                <p align="CENTER" lang="en-US">
                    54</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    2-3 года</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="104" width="33%">
                <p align="CENTER" lang="en-US">
                    104</p>
            </td>
            <td sdnum="1058;" sdval="56" width="33%">
                <p align="CENTER" lang="en-US">
                    56</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    3-4 года</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="110" width="33%">
                <p align="CENTER" lang="en-US">
                    110</p>
            </td>
            <td sdnum="1058;" sdval="58" width="33%">
                <p align="CENTER" lang="en-US">
                    58</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    4-5 лет</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="116" width="33%">
                <p align="CENTER" lang="en-US">
                    116</p>
            </td>
            <td sdnum="1058;" sdval="60" width="33%">
                <p align="CENTER" lang="en-US">
                    60</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    5-6 лет</p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="122" width="33%">
                <p align="CENTER" lang="en-US">
                    122</p>
            </td>
            <td sdnum="1058;" sdval="62" width="33%">
                <p align="CENTER" lang="en-US">
                    62</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="en-US">
                    6-7 <span lang="ru-RU">лет</span></p>
            </td>
        </tr>
        <tr valign="TOP">
            <td sdnum="1058;" sdval="128" width="33%">
                <p align="CENTER" lang="en-US">
                    128</p>
            </td>
            <td sdnum="1058;" sdval="64" width="33%">
                <p align="CENTER" lang="ru-RU">
                    64</p>
            </td>
            <td width="33%">
                <p align="CENTER" lang="ru-RU">
                    7-8 лет</p>
            </td>
        </tr>
    </tbody>
</table></div>
    <p class="recomended-descriptions"><?=$_LANG["It_may_interest_you"]?></p>
 <div class="wrapper-recomended">
      

  </div>
  
  <!-- <div class="footer">
                <div class="footer2 overflow-product">
                    <ul class="footer-ul1">
                        <li class="bold-footer" >Информация</li>
                        <li><a href="">Доставка, оплата</a></li>
                        <li><a href="">Оптовым покупателям</a></li>
                        <li><a href="">Таблица размеров</a></li>
                        <li><a href="">Наши магазины</a></li>
                    </ul>
                    
                    <ul class="footer-ul3">
                        <a href="index.php"><img src="img/logo_old_grey.png" width="300px" height="250px" alt=""></a>
                    </ul>
                    <ul class="footer-ul4">
                        <li class="bold-footer" >Контакты</li>
                        <li><a href="skype:nerron49?call">+38 (098) 462-58-68 <span><img src="img/skype.png" width="25px" height="25px" alt="skype"></span></a></li>
                        <li><a href="skype:nerron49?call">+38 (0382) 71-91-56 <span><img src="img/skype.png" width="25px" height="25px" alt="skype"></span></a></li>
                        <li><a href="skype:nerron49?call">+38 (063) 535-48-08<span><img src="img/skype.png" width="25px" height="25px" alt="skype"></span></a></li>
                        <li><a href="mailto:zakaz@malenkesonechko.com?subject=Вопрос от покупателя вашего магазина">zakaz@malenkesonechko.com <span><img src="img/Mail.png" width="25px" height="25px" alt="mail"></span></a></li>
                    </ul>
                </div>
        </div> -->
  </div>
  
  
    </div>
   
  <script type="text/javascript">
                    $("a.cloud-zoom-gallery").click(function() {      
                      var theHref = $(this).attr("href");
                      $(".icon-zoomin").attr("href", theHref);
                    });
                    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.colorbox').colorbox({
                    overlayClose: true,
                    opacity: 0.5,
                    rel: "colorbox",
                    maxWidth: '100%',
                    maxHeight: '100%',
                    scalePhotos: true,
                    scrolling: true,
                    reposition: true
        });
        $(document).bind('cbox_open', function() {
            $('html').css({ overflow: 'hidden' });
        }).bind('cbox_closed', function() {
            $('html').css({ overflow: '' });
        });
        });
    </script> 
  

    
    <script src="js/index.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
   <script src="js/show.js"></script>
</body>
</html>