<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        
        $title_ru = addslashes(trim($_POST["title_ru"]));
        $title_ua = addslashes(trim($_POST["title_ua"]));
        $title_en = addslashes(trim($_POST["title_en"]));
        $code = addslashes(trim($_POST["code"]));
        $price = trim($_POST["price"]);
        $price_wholesale = trim($_POST["price_wholesale"]);
        $quantity = trim($_POST["quantity"]);
        $pieces_per_pack = trim($_POST["pieces_per_pack"]);
        $image =  trim($_POST["image"]);
        $image2 =  trim($_POST["image2"]);
        $image3 = trim($_POST["image3"]);
        $image4 = trim($_POST["image4"]);
        $image5 = trim($_POST["image5"]);
        $image6 = trim($_POST["image6"]);
        $description_ru = addslashes(trim ($_POST["description_ru"]));
        $description_ua = addslashes(trim ($_POST["description_ua"]));
        $description_en = addslashes(trim ($_POST["description_en"]));
        $r1 = trim($_POST["r1"]);
        $color_ru = trim($_POST["color_ru"]);
        $color_ua = trim($_POST["color_ua"]);
        $color_en = trim($_POST["color_en"]);
        $category = trim($_POST["category"]);
        $age = trim($_POST["age"]);
        $sex = trim($_POST["sex"]);
        $price_for_size = trim($_POST["price_for_size"]);
        $search_color = explode(" ", $color);
        $search_color = $search_color[0];
        $result = mysqli_query($link, "INSERT INTO products(title_ru,title_ua,title_en,code,price,price_wholesale,image,image2,image3,image4,image5,image6,description_ru,
        description_ua,description_en,r1,
                        color_ru,color_ua,color_en,category,age,sex,visible,pieces_per_pack,quantity,datetime,search_color,price_for_size)
						VALUES(	
                            '$title_ru',
                            '$title_ua',
                            '$title_en',
                            '$code',
                            '$price',
                            '$price_wholesale',
                            '$image',
                            '$image2',
                            '$image3',
                            '$image4',
                            '$image5',
                            '$image6',
                            '$description_ru',
                            '$description_ua',
                            '$description_en',
                            '$r1',
                            '$color_ru',
                            '$color_ua',
                            '$color_en',
                            '$category',
                            '$age',
                            '$sex',
                            '1',
                            '$pieces_per_pack',
                            '$quantity',
							NOW(),
                            '$search_color'.
                            '$price_for_size'
						    )");	

        if(!$result)
            die(mysqli_error($link));
       //echo"";
    }
?>