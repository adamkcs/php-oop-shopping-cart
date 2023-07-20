<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity) 
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct() 
    {
        return $this->product;
    }
    public function setProduct(Product $product) 
    {
        $this->product = $product;
    }

    public function getQuantity() 
    {
        return $this->quantity;
    }
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        if ($this->quantity !== $this->product->getAvailableQuantity()) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 0) {
            $this->quantity--;
        }
    }
}