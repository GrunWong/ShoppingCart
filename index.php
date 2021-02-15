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

if(isset($_POST["add"])) {
    $_SESSION["cart"]->addToCart($_POST["hidden_name"], $_POST["hidden_price"]);
    echo $_POST["hidden_name"]." added to cart.";
} elseif(isset($_POST["remove"])) {
    $_SESSION["cart"]->removeFromCart($_POST["hidden_name"]);
}

// Only print cart if its not empty
if(!empty($_SESSION["cart"])) {
    $cart_list = $_SESSION["cart"]->getCart();
    
    // Table to visualise shopping cart
    echo '<table border="1" class="table">
        <tr>
            <th width="50%">Product Name</th>
            <th width="10%">Price</th>
            <th width="20%">Quantity</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>';
        for($i = 0; $i < count($cart_list); $i++) {
            echo '<tr>
                <td>'.$cart_list[$i]["name"].'</td>
                <td>'.$cart_list[$i]["price"].'</td>
                <td>'.$cart_list[$i]["quantity"].'</td>
                <td>'.$cart_list[$i]["total"].'</td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="hidden_name" value="'.$cart_list[$i]["name"].'" />
                        <input type="submit" name="remove" value="Remove" />
                    </form>
                </td>
            </tr>';
        }
        echo '<tr>
            <td colspan="3" align="right">Overall Total</td>
            <td align="right">'.$_SESSION["cart"]->getOverall().'</td>
            <td>
                <form action="index.php" method="post">
                    <input type="submit" name="checkout" value="Checkout" />
                </form>
            </td>
        </tr>
    </table>';
}

?>