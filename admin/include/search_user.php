<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include("db_connect.php");
        $link = db_connect();
        $login  = (isset($_POST['login'])) ? $_POST['login'] : "";
        if ($login != "") {
            $query = "SELECT * FROM reg_user WHERE login='$login'";
            $result = mysqli_query($link, $query);

            if(!$result)
                die(mysqli_error($link));

            $u = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0){
                if ($u['wholesaler'] == 1) {
                    echo '<p>'.$u['login'].' '.$u['name'].' '.$u['surname'].' '.$u['email'].' '.$u['phone'].'</p>
                        <button id="'.$u['id'].'" class = "btn btn-default remove_rights " >Снять права</button>';
                }

                else {
                    echo '<p>'.$u['login'].' '.$u['name'].' '.$u['surname'].' '.$u['email'].' '.$u['phone'].'</p>
                        <button id="'.$u['id'].'" class = "btn btn-default give_the_right " >Дать права</button>';
                }
            
            }
        }
        
    }
?>