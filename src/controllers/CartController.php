<?php
class CartController 
{
    public static function Cart() {
        include_once ROOT_DIR . '/src/views/shopping-cart.php';
    }

    public static function Pay() {
        include_once ROOT_DIR . '/src/views/payment-page.php';
    }
}