<?php

class cart {

    private $overall;
    private array $products_in_cart;

    public function __construct() {
        $this->overall = 0.0;
        $this->products_in_cart = [];
    }

    public function getOverall(): float {
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
            if($this->products_in_cart[$i]["quantity"] > 1) {
                $this->products_in_cart[$i]["quantity"]--;
                $this->products_in_cart[$i]["total"] = number_format($products_in_cart[$i]["price"], 2) * $products_in_cart[$i]["quantity"];
            } else {
                array_splice($products_in_cart, $i, 1);
            }
        }
    }

}