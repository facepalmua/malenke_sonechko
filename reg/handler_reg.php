<?php
    include("../include/db_connect.php");
    $link = db_connect();
    $login = addslashes(trim($_POST["username"]));
    $password = addslashes(trim($_POST["password"]));
    $password1 = addslashes(trim($_POST["password1"]));
    
    $surname = addslashes(trim($_POST["surname"]));
    $name = addslashes(trim ($_POST["name"]));
    $email = addslashes(trim($_POST["email"]));
    $place = addslashes(trim($_POST["place"]));
    $post_office = addslashes(trim($_POST["post_office"]));
    $phone_number = addslashes(trim($_POST["phone_number"]));
    $ip = $_SERVER["REMOTE_ADDR"];

    $check_login = mysqli_query($link, "SELECT login FROM reg_user WHERE login = '$login'");

    if (mysqli_num_rows($check_login)>0){
        $check_login = true;
        
    }
    else {
        $check_login = false;
    }
    
    if (($password == $password1) and ($check_login == false) ) {
        $pass = $password;
        $password = md5($password);
        $query= "INSERT INTO reg_user(login, password, name, surname, email, place, post_office, phone, ip) VALUES(
                  '".$login."',
                  '".$password."',
                  '".$name."',
                  '".$surname."',
                  '".$email."',
                  '".$place."',
                  '".$post_office."',
                  '".$phone_number."',
                  '".$ip."')";

        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));
        
        
        mail($email, "Маленьке сонечко", "Логин: $login \nПароль: $pass",'From: zakaz@gmail.com '); 
        echo '';
    }
    else {
        exit();
    }
?>