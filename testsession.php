<?php

session_start();

if($_SESSION["login"]!=1){
    header('Location: login.php');
    die();
}
header('Location: https://example.com/callback-url');

?>