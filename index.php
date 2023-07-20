<?php

require_once "Product.php";
require_once "Cart.php";
require_once "CartItem.php";

$product1 = new Product(1, "Vango 8 person Air Tent", 2500, 10);
$product2 = new Product(2, "Inflatable sofa", 400, 10);
$product3 = new Product(3, "Portable solar panel", 3200, 10);

$cart = new Cart();

$cartItem1 = $cart->addProduct($product1, 1);
$cartItem1 = $cart->addProduct($product1, 7);

$cartItem2 = $product2->addToCart($cart, 1);

echo "Number of items in cart: " . PHP_EOL;
echo $cart->getTotalQuantity() . PHP_EOL;
echo "Total price of items in cart: " . PHP_EOL;
echo $cart->getTotalSum() . PHP_EOL;

$cartItem2->increaseQuantity();
$cartItem2->increaseQuantity();

echo "Number of items in cart: " . PHP_EOL;
echo $cart->getTotalQuantity() . PHP_EOL;

echo "Total price of items in cart: " . PHP_EOL;
echo $cart->getTotalSum() . PHP_EOL;

$cart->removeProduct($product1);

echo "Number of items in cart: " . PHP_EOL;
echo $cart->getTotalQuantity() . PHP_EOL;

echo "Total price of items in cart: " . PHP_EOL;
echo $cart->getTotalSum() . PHP_EOL;
?>