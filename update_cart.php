<?php
session_start();

if (isset($_POST['key']) && isset($_POST['quantity'])) {
    $key = $_POST['key'];
    $quantity = $_POST['quantity'];


    $_SESSION['cart'][$key]['quantity'] = $quantity;

    
    $_SESSION['cart'][$key]['total_price'] = $_SESSION['cart'][$key]['product_price'] * $quantity;


    $_SESSION['total'] = 0;
    foreach ($_SESSION['cart'] as $item) {
        $_SESSION['total'] += $item['total_price'];
    }

    
}
?>