<?php

session_start();

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
    echo "<p>".$products[$i]["name"].' <input type="button" onclick="alert("Item Added")" value="Add to cart"><br>'
        ." Price: ".number_format($products[$i]["price"], 2)."<br></p>";
}

?>