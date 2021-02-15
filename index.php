<?php

require_once "cart.php";

session_start();

// If session cart isn't declared, declare it
if(!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = new cart();
    echo "Session cart initialized <br>";
}

// Products list
// ######## please do not alter the following code ########
$products = [
 [ "name" => "Sledgehammer", "price" => 125.75 ],
 [ "name" => "Axe", "price" => 190.50 ],
 [ "name" => "Bandsaw", "price" => 562.131 ],
 [ "name" => "Chisel", "price" => 12.9 ],
 [ "name" => "Hacksaw", "price" => 18.45 ],
];
// ########################################################

for($i = 0; $i < count($products); $i++) {
    echo "<p>".$products[$i]["name"]."<br>Price: ".number_format($products[$i]["price"], 2)
    .'<form action="index.php" method="post">
        <input type="hidden" name="hidden_name" value="'.$products[$i]["name"].'" />
        <input type="hidden" name="hidden_price" value="'.number_format($products[$i]["price"], 2).'" />
        <input type="submit" name="add" value="Add to cart" />
    </form><br></p>';
}

// Only print cart if its not empty
if(!empty($_SESSION["cart"])) {
    $cart_list = $_SESSION["cart"]->getCart();
    var_dump($cart_list);
}

if(isset($_POST["add"])) {
    $_SESSION["cart"]->addToCart($_POST["hidden_name"], $_POST["hidden_price"]);

    echo "Item ".$_POST["hidden_name"]." added to cart.";
}

?>