<?php
    include("include/db_connect.php");
    $link = db_connect();
        
    $query = "SELECT * FROM reg_user ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

        $n = mysqli_num_rows($result);
        $user = array();

        for($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $user[] = $row;
        }
            
                
            
            
        
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
   <link rel="stylesheet" href="css/style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
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
<p align="right"><a href="administrators.php" >Администраторы</a> | <a href="?logout">Выход</a></p>
<p align="right">Вы - <span>Администратор</span></p>
</div>

</div>

<div id="left-nav">
<ul>
<li><a href="orders.php">Заказы</a></li>
<li><a href="tovar.php">Товары</a></li>
<li>
                <a href="slider.php">Слайдер</a>
            </li>
<li><a href="clients.php">Клиенты</a></li>
</ul>
</div>
    <div id="tovar-right">
    <div class="position-add"><input type="search" id="search_login">
        <button type="submit" class="btn" id="search_user">Найти</button>
</div>
        
        <div id="tovar">
        
        <?php foreach($user as $u) : ?>
            <?php
                if ($u['wholesaler'] == 1) {
                    echo '<p>'.$u['login'].'<br>'.$u['name'].' '.$u['surname'].' <br>'.$u['email'].' <br>'.$u['phone'].'<br></p>
                        <button id="'.$u['id'].'" class = "btn btn-default remove_rights " >Снять права</button>';
                }

                else {
                    echo '<p>'.$u['login'].'<br> '.$u['name'].' '.$u['surname'].'<br> '.$u['email'].' <br>'.$u['phone'].'<br></p>
                        <button id="'.$u['id'].'" class = "btn btn-default give_the_right " >Дать права</button>';
                }
            ?>

        <?php endforeach ?>

            
        </div>
    </div>
    
</body>
</html>