<?php
    include("include/db_connect.php");
    
    $link = db_connect();
    $id = (isset($_GET['id'])) ? $_GET['id'] : "";

    $query = "SELECT * FROM products WHERE products_id='$id'";
    $result = mysqli_query($link, $query);
        
    if(!$result)
        die(mysqli_error($link));
        
    $product = mysqli_fetch_assoc($result);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
    <div id="tovar-right">

        <form id="edit_product" method="post">
            <p>
                <label>Назва</label>
            </p>
            <p>
                <input type="text" value="<?=$product["title_ru"]?>" name="title_ru" id="title_ru"></p>
            <p>
                <input type="text" value="<?=$product["title_ua"]?>" name="title_ua" id="title_ua" required placeholder="ua"></p>
            <p>
                <input type="text" value="<?=$product["title_en"]?>" name="title_en" id="title_en" required placeholder="en"></p>
            <p>
                <label>Код товара</label>
            </p>
            
            <p>
                <input type="text" value="<?=$product["code"]?>" name="code" id="code" required></p>
            <p>
                <label>Цена</label>
            </p>
            <p>
                <input type="text" value="<?=$product["price"]?>" name="price" id="price"></p>
            <p>
                <label>Оптовая цена</label>
            </p>
            <p>
                <input type="text" value="<?=$product["price_wholesale"]?>" name="price_wholesale" id="price_wholesale"></p>
            <p>
                <label>Количество упаковок</label>
            </p>
            <p>
                <input type="text" value="<?=$product["quantity"]?>" name="quantity" id="quantity"></p>
            <p>
            
            <p>
                <label>Количество в упаковке</label>
            </p>
            <p>
                <input type="text" value="<?=$product["pieces_per_pack"]?>" name="pieces_per_pack" id="pieces_per_pack"></p>
            <p>
                <label>Путь к картинкам</label>
            </p>
            <p>
                <input type="text" value="<?=$product["image"]?>
                " name="image" id="image">
                <p>
                    <input type="text" value="<?=$product["image2"]?>" name="image2" id="image2"></p>
                <p>
                    <input type="text" value="<?=$product["image3"]?>" name="image3" id="image3"></p>
            <p>
                    <input type="text" value="<?=$product["image4"]?>" name="image4" id="image4"></p>
            <p>
                    <input type="text" value="<?=$product["image5"]?>" name="image5" id="image5"></p>
            <p>
                    <input type="text" value="<?=$product["image6"]?>" name="image6" id="image6"></p>
<div class="edit-pos">
                <p>
                    <label>Описание</label>
                    <p>
                        <textarea name="description_ru" id="description_ru" rows="5" cols="40" >
                            <?=$product["description_ru"]?></textarea>
                    </p>
                    <p>
                        <textarea name="description_ua" id="description_ua" rows="5" cols="40" placeholder="ua">
                            <?=$product["description_ua"]?></textarea>
                        <br></p>
                    <p>
                        <textarea name="description_en" id="description_en" rows="5" cols="40" placeholder="en">
                            <?=$product["description_en"]?></textarea>
                        <br></p>
                    <p>
                        <label>Цвет</label>
                    </p>
                    <input size="1" type="text" value="<?=$product["color_ru"]?>" name="color_ru" id="color_ru"><br>
                   
                    <p>
                        <label>Размеры</label>
                    </p>
                    <input size="1" type="text" value="<?=$product["r1"]?>
                    " name="r1" id="r1">
                    <p>
                        <label>Цены для размеров</label>
                    </p>
                    <input size="1" type="text" value="<?=$product["price_for_size"]?>
                    " name="price_for_size" id="price_for_size">
                    <br>
                    <br><br>

                           <p>
        <select name="category" id="category" required>
            <option value="<?=$product["category"]?>">Выберите категорию</option>
            <option value="Maternity_hospital">Собираемся в роддом</option>
            <option value="Blankets">Конверты,одеяла</option>
            <option value="Kits">Комплекты для малыша</option>
            <option value="Christening">Все для крестин</option>
            <option value="Overalls">Боди,комбинезоны</option>
            <option value="Blouse">Кофточки,гольфы</option>
            <option value="Creepers">Штаны,ползунки</option>
            <option value="Underwear">Белье,все для сна</option>
            <option value="For_holiday">Для праздников</option>
            <option value="Kits">Комплекты для модниц и модников</option>
            <option value="Caps">Головные уборы</option>
            <option value="Trivia">Разные мелочи</option>

            <option value="Bed_Included_Parts">Постельные комплекты</option>
            <option value="Napkins">Пеленки</option>
            <option value="Beanie">Шапочки,платочки</option>
            <option value="Bibs">Слюнявчики,нецарапки</option>
        </select>
    </p>
    <p>
        <select name="age" id="age" required>
            <option value="<?=$product["age"]?>">Выберите возраст</option>
            <option value="do_2">До 2 лет</option>
            <option value="ot_2">От 2 до 6 лет</option>
        </select>
    </p>
    <p>
        <select name="sex" id="sex">
            <option value="<?=$product["sex"]?>">Выберите пол</option>
            <option value="">Унисекс</option>
            <option value="boy">Мальчик</option>
            <option value="girl">Девочка</option>
        </select>
    </p>
      <p>
                        <input  size="1" type="submit"  id="save-change" class="btn btn-success edit-btn-save" value="Сохранить изменения"></p>

                </form>

                <p id="message"></p>
            </div>
</body>
        </html>