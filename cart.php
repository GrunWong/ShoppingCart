<?php

class cart {

    private $overall;
    private array $products_in_cart;

    public function __construct() {
        $this->overall = 0.0;
        $this->products_in_cart = [];
    }

    public function getOverall(): float {
        // Reset variable memory before display with each page refresh
        $this->overall = 0.0;
        for($i = 0; $i < count($this->products_in_cart); $i++) {
            $this->overall += $this->products_in_cart[$i]["total"];
        }
        return $this->overall;
    }

    public function getCart(): array {
        return $this->products_in_cart;
    }

    protected function setCart(array $cart) {
        $this->products_in_cart = $cart;
        var_dump($this->products_in_cart);
    }

    public function addToCart($product, $price) {
        // First product in cart is always appended
        if(count($this->products_in_cart) == 0) {
            $this->products_in_cart[] = array("name" => $product, "price" => $price, "quantity" => 1, "total" => $price);
        } else {
            for($i = 0; $i < count($this->products_in_cart); $i++) {
                // Checks if product already exists in cart or not, if not then add to cart
                if(!strcmp($this->products_in_cart[$i]["name"], $product)) {
                    $this->products_in_cart[$i]["quantity"]++;
                    $this->products_in_cart[$i]["total"] = number_format($this->products_in_cart[$i]["price"], 2) * $this->products_in_cart[$i]["quantity"];
                    break;
                } elseif($i == (count($this->products_in_cart) - 1)) {
                    $this->products_in_cart[] = array("name" => $product, "price" => $price, "quantity" => 1, "total" => $price);
                    break;
                }
            }
        }
    }

    public function removeFromCart($product) {
        for($i = 0; $i < count($this->products_in_cart); $i++) {
            // Compare product names to decrement/remove the right product
            if(!strcmp($this->products_in_cart[$i]["name"], $product)) {
                if($this->products_in_cart[$i]["quantity"] > 1) {
                    $this->products_in_cart[$i]["quantity"]--;
                    $this->products_in_cart[$i]["total"] = number_format($this->products_in_cart[$i]["price"], 2) * $this->products_in_cart[$i]["quantity"];
                } else {
                    array_splice($this->products_in_cart, $i, 1);
                }
            }
        }
    }

}