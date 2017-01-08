<?php
    
    function sort_all($sort){
        
        global $sort_name;
        switch ($sort){
        case "price_asc":
            $query_sort = "ORDER BY price ASC";
            $sort_name = "От дешових к дорогим";
            break;
        case "price_desc":    
            $query_sort = "ORDER BY price DESC";
            $sort_name = "От дорогих к дешевым";
            break;

        case "pop":
            $query_sort = "ORDER BY count DESC";
            $sort_name = "Популярные";
            break;

        case "new":
            $query_sort = "ORDER BY datetime DESC";
            $sort_name = "Новинки";
            break;
            
                
        default:
            $query_sort = "ORDER BY products_id ASC";
            $sort_name = "Без сортировки";
            break;
        } 
        return $query_sort;
    }

    function products($link, $query_sort, $category){  
        if(!empty($category)) {
            $category = "AND category ="."'".$category."'";
        }
        else{
            $category="";
        }
        
        $query = "SELECT * FROM products WHERE visible = 1 $category $query_sort";
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));

        $n = mysqli_num_rows($result);
        $products = array();

        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $products[] = $row;
        }

        return $products;
    }


    function products_sort($link, $category, $age, $sex, $query_sort, $price_from, $price_to, $color){    
        if(!empty($category) and $category !="undefined") {
            $category = "AND category ='$category'";
        }
        else{
            $category="";
        }
        
        if(!empty($age) and $age !="undefined") {
            $age = "AND age ='$age'";
        }
        else{
            $age="";
        }
        
        if(!empty($sex) and $sex !="undefined") {
            $sex = "AND sex ='$sex'";
        }
        else{
            $sex="";
        }
        
        if(!empty($price_from) or !empty($price_to)) {
            $query_price = "AND price BETWEEN $price_from AND $price_to";
        }
        else $query_price = "";
        
        
        if(!empty($color)) {
            $color = "AND search_color IN (".$color.")";
        }
        
        $query = "SELECT * FROM products WHERE visible=1 $category $age $sex $query_price  $color $query_sort";
        
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));

        $n = mysqli_num_rows($result);
        $products = array();

        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $products[] = $row;
        }

        return $products;
    }


    function product_get($link, $id) {
        $query = sprintf("SELECT * FROM products WHERE products_id=%d", (int)$id);
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
        
        $product = mysqli_fetch_assoc($result);  
        $new_count = $product["count"] + 1;
        mysqli_query ($link, "UPDATE products SET count='$new_count' WHERE products_id='$id'");   
        
        
        return $product;
    }

    function new_products($link) {
        $query = "SELECT * FROM products WHERE visible = 1 ORDER BY datetime DESC LIMIT 8";
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));

        $n = mysqli_num_rows($result);
        $products = array();

        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $products[] = $row;
        }

        return $products;
    }

?>