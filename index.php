<?php

require_once "Connect.php";
require_once "Cart.php";
require_once "Products.php";

$conn       = new Connect();
$products   = new Products();
$cart       = new Cart();

$notebook   = $products->getProduct($conn, '1');
$phone      = $products->getProduct($conn, '2');
$tv         = $products->getProduct($conn, '3');
$cleaner    = $products->getProduct($conn, '4');

$cart->setSale();                               //Распродажа
$cart->setDeliveryCustomer();                   //Скидка постоянного покупателя

$cart->addCart($notebook);
$cart->addCart($phone);
$cart->addCart($tv);
$cart->addCart($cleaner);
$cart->addCart($cleaner);

$cart->delCart($phone['id']);

print_r($_SESSION);
