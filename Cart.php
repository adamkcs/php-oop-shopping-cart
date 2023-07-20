<?php

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    public function getItems()
    {
        return $this->items;
    }
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    public function addProduct(Product $product, int $quantity): CartItem
    {
        $productKeyinItems = $this->findProductInCart($product);
        if ($productKeyinItems >= 0) {
            $productCartItem = $this->items[$productKeyinItems];
            $availQnty = $product->getAvailableQuantity();
            $cartQnty = $productCartItem->getQuantity();
            $newQnty = $cartQnty + $quantity;
    
            // Maximize cart quantity to available quantity
            if ($availQnty >= $newQnty) {
                $productCartItem->setQuantity($newQnty);
            }
            else {
                $productCartItem->setQuantity($availQnty);
            }

            return $productCartItem;    
        }
        else {
            // Create brand new CartItem object
            $newCartItem = new CartItem($product, $quantity);
            array_push($this->items, $newCartItem);        
    
            return $newCartItem;    
        }
    }

    // Check if product is already in cart and return its array key if so
    public function findProductInCart(Product $product): int 
    {
        foreach ($this->items as $key => $val) {
            if ($product->getId() === $val->getProduct()->getId()) {
                return $key;
            }
        }
        return -1;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $productKeyInItems = $this->findProductInCart($product);
        unset($this->items[$productKeyInItems]);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalQnty = 0;
        foreach ($this->items as $cartItem) {
            $totalQnty += $cartItem->getQuantity();
        }

        return $totalQnty;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $totalSum = 0;
        foreach ($this->items as $cartItem) {
            $totalSum += $cartItem->getQuantity() * $cartItem->getProduct()->getPrice();
        }

        return $totalSum;    
    }
}