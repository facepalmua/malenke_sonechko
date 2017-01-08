<?php
define('MYSQL_SERVER','malson00.mysql.ukraine.com.ua');
define('MYSQL_USER','malson00_db');
define('MYSQL_PASSWORD','ySJpwvdz');
define('MYSQL_DB','malson00_db');

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die("Error: ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8"))
        printf("Error: ".mysqli_error($link));
    return $link;
}
?>