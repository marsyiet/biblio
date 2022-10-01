<?php

function connect(){
    $connect = new PDO('mysql:host=localhost;dbname=bibliot','root','root');
    return $connect;
} 
?>