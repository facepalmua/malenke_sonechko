<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("../include/db_connect.php");
        $link = db_connect();
        
        mysqli_query($link,"DELETE  FROM cart WHERE cart_datetime < (NOW() - INTERVAL 7 DAY)") or die (mysql_error ());
        session_start();
        $id = $_POST["id"];
        $size_price = explode("|",$_POST["size"]);
        $size = $size_price[0];
        $color = $_POST["color"];
        $quantity = $_POST["quantity"];
        $comment = (isset($_POST['comment'])) ? addslashes($_POST['comment']) : "";
        if(isset($_SESSION["auth"])){
            $identifier = "login = '{$_SESSION["auth_login"]}'";
        }
        else {
            $identifier = "cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
        }
        $result = mysqli_query($link, "SELECT * FROM cart WHERE $identifier AND cart_id_products = '$id'");
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result); 
            $price = (!empty($size_price[1])) ? $size_price[1] : $row['price'] ;
            $new_price = $row["cart_price"] + $price * $quantity;
            $new_count = $row["cart_quantity"] + $quantity;
            if ($size == "УПАКОВКА") {
                $size = "";
            }
            else {
                $size = ', '.$size.'-'.$quantity.'шт';
            }
            if ($comment != "") {
                $comment = '. '.$comment;
            }
            
            $update = mysqli_query ($link, "UPDATE cart SET cart_quantity='$new_count',size=CONCAT(size,'$size'),comment=CONCAT(comment,'$comment'), color_cart=CONCAT(color_cart,' $color'),
            cart_price='$new_price' WHERE $identifier AND cart_id_products ='$id'");   
            //echo($new_price);
        }
        else{
            $result = mysqli_query($link, "SELECT * FROM products WHERE products_id = '$id'");
            $row = mysqli_fetch_array($result);
            
            if(isset($_SESSION["auth"])){
                if ($_SESSION["auth"] == "yes_auth_wholesaler"){ 
                    $price = $row['price_wholesale']*$quantity;
                }
                else {
                    
                    $price = (!empty($size_price[1])) ? $size_price[1] : $row['price'] ;
                    $price = $price * $quantity;

                }
                $size = $size.'-'.$quantity.'шт';
                mysqli_query($link, "INSERT INTO cart(cart_id_products,size,cart_price,cart_datetime,login,cart_quantity,comment,color_cart)
                            VALUES(	
                                '".$row['products_id']."',
                                '$size',
                                '$price',					
                                NOW(),
                                '".$_SESSION["auth_login"]."',
                                '$quantity',
                                '$comment',
                                '$color'
                                )");	
                
                }
            
            else {
                $price = (!empty($size_price[1])) ? $size_price[1] : $row['price'] ;
                $price = $price * $quantity;
                $size = $size.'-'.$quantity.'шт';
                mysqli_query($link, "INSERT INTO cart(cart_id_products,size,cart_price,cart_datetime,cart_ip,cart_quantity,comment,color_cart)
                                VALUES(	
                                    '".$row['products_id']."',
                                    '$size',
                                    '$price',					
                                    NOW(),
                                    '".$_SERVER['REMOTE_ADDR']."',
                                    '$quantity',
                                    '$comment',
                                    '$color'
                                    )");	
            }
            
        }
        
        echo"";
    }
?>