<?php
session_start();

if (isset($_GET['key']) && isset($_SESSION['cart'][$_GET['key']])) {

    unset($_SESSION['cart'][$_GET['key']]);
    

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}


header('Location: index.php'); 
exit();
?>