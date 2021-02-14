<?php

class Cart {

    private $overall;
    private $products_in_cart;

    public function __construct() {
        $overall = 0;
        $products_in_cart = [];
    }

    public function getOverall() {
        return $overall;
    }

    public function getCart() {
        return $products_in_cart;
    }

    public function addToCart($product, $price) {
        for($i = 0; i < count($products_in_cart); $i++) {
            // Checks if product already exists in cart or not, if not then add to cart
            if(!strcmp($products_in_cart[$i]["name"])) {
                $products_in_cart[$i]["quantity"]++;
                $products_in_cart[$i]["total"] = number_format($products_in_cart[$i]["price"]), 2) * $products_in_cart[$i]["quantity"];
            } else {
                $products_in_cart[$i] = ["name" => $product, "price" => $price, "quantity" => 1, "total" = $price];
            }
        }
    }

    public function removeFromCart($product) {
        for($i = 0; i < count($products_in_cart); $i++) {
            if($products_in_cart[$i]["quantity"] > 1) {
                $products_in_cart[$i]["quantity"]--;
                $products_in_cart[$i]["total"] = number_format($products_in_cart[$i]["price"]), 2) * $products_in_cart[$i]["quantity"];
            } else {
                array_splice($products_in_cart, $i, 1);
            }
        }
    }

}

?>