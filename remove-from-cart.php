<?php
    session_start();
    $link = $_SERVER['REQUEST_URI'];
    $id = parse_url($link, PHP_URL_QUERY);
    $key=array_search($_GET['id'],$_SESSION['cart']);
    if($key!==false)
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header('location:cos.php');

?>