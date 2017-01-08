<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("../include/db_connect.php");
        if (isset($_COOKIE["lang"])){
            include('../languages/' .$_COOKIE["lang"]. '.php');
        }
        else {
            include('../languages/ru.php');
        }
        $link = db_connect();
        
        $id = $_POST["id"];
        $color = $_POST["color"];
        $color = explode(" ", $color);
        $color = $color[0];
        //$row_count = mysql_result(mysqli_query('SELECT COUNT(*) FROM products;'), 0);
        /*$query = array();
        while (count($query) < 3) {
            $query[] = '(SELECT * FROM products LIMIT '.rand(0, 100).', 1)';
        }
        $query = implode(' UNION ', $query);
        $result = mysqli_query($link, $query);*/
        
        $query = "SELECT * FROM products WHERE visible=1 AND color_ru LIKE '%$color%' AND products_id!='$id' ORDER BY RAND() LIMIT 4";
        
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows($result);
        $products = array();

        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $products[] = $row;
        }
        
       foreach($products as $p) {
           echo '<div class="content">
                <div class="grid">
                <b>'.$p['price'].'UAH</b>
                <figure class="effect-chico">
                        <a href="product.php?id='.$p['products_id'].'">
                            <img src="img/products/'.$p['image'].'" alt="">
                        <figcaption>
                            <p>'.$_LANG["Add_to_Basket"].' 
                            <img id="cart-white"  src="img/cart_white.png" alt="cart">
                            '.$p['title_'.$_COOKIE["lang"].''].'
                            <br>
                            <b>'.$p['price'].'UAH</b>
                            </p>
                        </figcaption> 
                        </a>
                    </figure>
                   
                </div>

               <!--  </div>  -->     
            </div>';
           
        }
    }
?>