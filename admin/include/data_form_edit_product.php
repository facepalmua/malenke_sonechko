<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $id = $_POST["id"];
        $title_ru = addslashes(trim($_POST["title_ru"]));
        $title_ua = addslashes(trim($_POST["title_ua"]));
        $title_en = addslashes(trim($_POST["title_en"]));
        $code = addslashes(trim($_POST["code"]));
        $price = trim($_POST["price"]);
        $price_wholesale = trim($_POST["price_wholesale"]);
        $pieces_per_pack = trim($_POST["pieces_per_pack"]);
        $quantity = trim($_POST["quantity"]);
        $image =  trim($_POST["image"]);
        $image2 =  trim($_POST["image2"]);
        $image3 = trim($_POST["image3"]);
        $image4 = trim($_POST["image4"]);
        $image5 = trim($_POST["image5"]);
        $image6 = trim($_POST["image6"]);
        $description_ru = addslashes(trim ($_POST["description_ru"]));
        $description_ua = addslashes(trim ($_POST["description_ua"]));
        $description_en = addslashes(trim ($_POST["description_en"]));
        $price_for_size = trim($_POST["price_for_size"]);
        $r1 = trim($_POST["r1"]);
        $color_ru = trim($_POST["color_ru"]);
        $color_ua = trim($_POST["color_ua"]);
        $color_en = trim($_POST["color_en"]);
        $category = trim($_POST["category"]);
        $age = trim($_POST["age"]);
        $sex = trim($_POST["sex"]);
        
        $query= "UPDATE products SET title_ru = '$title_ru',title_ua = '$title_ua',title_en = '$title_en',code='$code',price='$price',price_wholesale='$price_wholesale',pieces_per_pack='$pieces_per_pack',quantity='$quantity',image='$image', image2='$image2',image3='$image3',image4='$image4',image5='$image5',image6='$image6',description_ru='$description_ru',description_ua='$description_ua',description_en='$description_en',r1='$r1',price_for_size='$price_for_size',color_ru='$color_ru',color_ua='$color_ua',
        color_en='$color_en',category='$category',age='$age',sex='$sex' 
        WHERE products_id='$id'";

        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));
       
    }
?>