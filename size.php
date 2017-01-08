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
    <title>Document</title>
</head>
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
        <div class="delivery">
            <div class="table-hide">
                <input type="button" name="" id="close-table">
                <table class="table  table-bordered   table-position>
                    <colgroup>
                    <col width="85*" />
                    <col width="85*" />
                    <col width="85*" />
                </colgroup>
                <tbody class="table-position">
                    <tr valign="TOP" class="success">
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">Рост</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">Обхват груди</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">Возраст</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="50" width="33%">
                            <p align="CENTER" lang="ru-RU">50</p>
                        </td>
                        <td sdnum="1058;" sdval="38" width="33%">
                            <p align="CENTER" lang="ru-RU">38</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">0-1 месяц</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="56" width="33%">
                            <p align="CENTER" lang="ru-RU">56</p>
                        </td>
                        <td sdnum="1058;" sdval="40" width="33%">
                            <p align="CENTER" lang="ru-RU">40</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">1-2 месяца</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="62" width="33%">
                            <p align="CENTER" lang="ru-RU">62</p>
                        </td>
                        <td sdnum="1058;" sdval="42" width="33%">
                            <p align="CENTER" lang="ru-RU">42</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">2-3 месяца</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="68" width="33%">
                            <p align="CENTER" lang="en-US">68</p>
                        </td>
                        <td sdnum="1058;" sdval="44" width="33%">
                            <p align="CENTER" lang="en-US">44</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">3-6 месяцев</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="74" width="33%">
                            <p align="CENTER" lang="en-US">74</p>
                        </td>
                        <td sdnum="1058;" sdval="46" width="33%">
                            <p align="CENTER" lang="en-US">46</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">6-9 месяцев</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="80" width="33%">
                            <p align="CENTER" lang="en-US">80</p>
                        </td>
                        <td sdnum="1058;" sdval="48" width="33%">
                            <p align="CENTER" lang="en-US">48</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">9-12 месяцев</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="86" width="33%">
                            <p align="CENTER" lang="en-US">86</p>
                        </td>
                        <td sdnum="1058;" sdval="50" width="33%">
                            <p align="CENTER" lang="en-US">50</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">1-1,5 года</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="92" width="33%">
                            <p align="CENTER" lang="en-US">92</p>
                        </td>
                        <td sdnum="1058;" sdval="52" width="33%">
                            <p align="CENTER" lang="en-US">52</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">1,5-2 года</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="98" width="33%">
                            <p align="CENTER" lang="en-US">98</p>
                        </td>
                        <td sdnum="1058;" sdval="54" width="33%">
                            <p align="CENTER" lang="en-US">54</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">2-3 года</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="104" width="33%">
                            <p align="CENTER" lang="en-US">104</p>
                        </td>
                        <td sdnum="1058;" sdval="56" width="33%">
                            <p align="CENTER" lang="en-US">56</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">3-4 года</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="110" width="33%">
                            <p align="CENTER" lang="en-US">110</p>
                        </td>
                        <td sdnum="1058;" sdval="58" width="33%">
                            <p align="CENTER" lang="en-US">58</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">4-5 лет</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="116" width="33%">
                            <p align="CENTER" lang="en-US">116</p>
                        </td>
                        <td sdnum="1058;" sdval="60" width="33%">
                            <p align="CENTER" lang="en-US">60</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">5-6 лет</p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="122" width="33%">
                            <p align="CENTER" lang="en-US">122</p>
                        </td>
                        <td sdnum="1058;" sdval="62" width="33%">
                            <p align="CENTER" lang="en-US">62</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="en-US">
                                6-7
                                <span lang="ru-RU">лет</span>
                            </p>
                        </td>
                    </tr>
                    <tr valign="TOP">
                        <td sdnum="1058;" sdval="128" width="33%">
                            <p align="CENTER" lang="en-US">128</p>
                        </td>
                        <td sdnum="1058;" sdval="64" width="33%">
                            <p align="CENTER" lang="ru-RU">64</p>
                        </td>
                        <td width="33%">
                            <p align="CENTER" lang="ru-RU">7-8 лет</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <?php
        include("footer.php");
    ?>
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
    <script>var meganavURL = "meganav";</script>
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