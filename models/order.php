<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("../include/db_connect.php");
        $link = db_connect();
        session_start();
        if(isset($_SESSION["auth"])){
            $identifier = "login = '{$_SESSION["auth_login"]}'";
            $login = $_SESSION["auth_login"];
        }
        else {
            $identifier = "cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
        }
        
        $surname = addslashes(trim($_POST["surname"]));
        $name = addslashes(trim ($_POST["name"]));
        $email = addslashes(trim($_POST["email"]));
        $place = addslashes(trim($_POST["place"]));
        $post_office = addslashes(trim($_POST["post_office"]));
        $phone_number = addslashes(trim($_POST["phone_number"]));
        $result = mysqli_query($link, "SELECT * FROM cart,products WHERE $identifier AND products.products_id = cart.cart_id_products ORDER BY cart_datetime DESC");
        $message = "";
        $message_e = "";
        //$price = 
        foreach($result as $r) {
//            if($r["size"]=="УПАКОВКА"){
//                $new_quantity = $r["quantity"] - $r["cart_quantity"];
//                $id = $r["products_id"];
//                mysqli_query ($link, "UPDATE products SET quantity='$new_quantity' WHERE products_id='$id'"); 
//            
//            
//            }
//                
//            mysqli_query($link, "INSERT INTO orders(order_name,order_surname,order_email,order_place,order_post_office,order_number,
//            order_id_product,order_size,order_quantity,order_price,order_datetime,active,order_comment)
//                                VALUES(	
//                                    '$name',
//                                    '$surname',
//                                    '$email',
//                                    '$place',
//                                    '$post_office',
//                                    '$phone_number',
//                                    '".$r['cart_id_products']."',
//                                    '".$r['size']."',
//                                    '".$r['cart_quantity']."',
//                                    '".$r['cart_price']."', 
//                                    NOW(),
//                                    '1',
//                                    '".$r['comment']."'
//                                    )");
            
            
            
            if(isset($_SESSION["auth"])){
                if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
                    $new_quantity = $r["quantity"] - $r["cart_quantity"];
                    if ($new_quantity >= 0){
                        $id = $r["products_id"];
                        mysqli_query ($link, "UPDATE products SET quantity='$new_quantity' WHERE products_id='$id'"); 
                        mysqli_query($link, "INSERT INTO orders(order_name,order_surname,order_email,order_place,order_post_office,order_number,
                        order_id_product,order_size,order_quantity,order_price,order_datetime,active,order_comment,order_color,order_login)
                                            VALUES(	
                                                '$name',
                                                '$surname',
                                                '$email',
                                                '$place',
                                                '$post_office',
                                                '$phone_number',
                                                '".$r['cart_id_products']."',
                                                '".$r['size']."',
                                                '".$r['cart_quantity']."',
                                                '".$r['cart_price']."', 
                                                NOW(),
                                                '1',
                                                '".$r['comment']."',
                                                '".$r['color_cart']."',
                                                '$login'
                                                )");
                        $message = "Ваш заказ принят";
                    }
                    else {
                        $message_e = $r["title_ru"]." Такого количества товара нету";
                    }
                    
                }
                else {
                    mysqli_query($link, "INSERT INTO orders(order_name,order_surname,order_email,order_place,order_post_office,order_number,
                        order_id_product,order_size,order_quantity,order_price,order_datetime,active,order_comment,order_color,order_login)
                                            VALUES(	
                                                '$name',
                                                '$surname',
                                                '$email',
                                                '$place',
                                                '$post_office',
                                                '$phone_number',
                                                '".$r['cart_id_products']."',
                                                '".$r['size']."',
                                                '".$r['cart_quantity']."',
                                                '".$r['cart_price']."', 
                                                NOW(),
                                                '1',
                                                '".$r['comment']."',
                                                '".$r['color_cart']."',
                                                '$login'
                                                )");
                    $message = "Ваш заказ принят";
                }
            }
            else {
                mysqli_query($link, "INSERT INTO orders(order_name,order_surname,order_email,order_place,order_post_office,order_number,
                        order_id_product,order_size,order_quantity,order_price,order_datetime,active,order_comment,order_color)
                                            VALUES(	
                                                '$name',
                                                '$surname',
                                                '$email',
                                                '$place',
                                                '$post_office',
                                                '$phone_number',
                                                '".$r['cart_id_products']."',
                                                '".$r['size']."',
                                                '".$r['cart_quantity']."',
                                                '".$r['cart_price']."', 
                                                NOW(),
                                                '1',
                                                '".$r['comment']."',
                                                '".$r['color_cart']."'
                                                )");
                $message = "Ваш заказ принят";
            }
        }
        echo $message."\n".$message_e;
     }

?>