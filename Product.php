<?php

class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    public function __construct(int $id, string $title, float $price, int $availableQuantity) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    // GETTERS AND SETTERS ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ 
    public function getId() 
    {
        return $this->id;
    }
    public function setId(int $id) 
    {
        $this->id = $id;
    }

    public function getTitle() 
    {
        return $this->title;
    }
    public function setTitle(string $title) 
    {
        $this->title = $title;
    }

    public function getPrice() 
    {
        return $this->price;
    }
    public function setPrice(float $price) 
    {
        $this->price = $price;
    }

    public function getAvailableQuantity() 
    {
        return $this->availableQuantity;
    }
    public function setAvailableQuantity(int $availableQuantity) 
    {
        $this->availableQuantity = $availableQuantity;
    }

    // ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ ↑ 

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        return $cart->addProduct($this, $quantity);
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method
    }
}