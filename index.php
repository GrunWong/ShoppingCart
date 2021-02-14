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

echo $products[0]["name"]." Price: ".$products[0]["price"].".<br>";
echo $products[1]["name"]." Price: ".$products[1]["price"].".<br>";
echo $products[2]["name"]." Price: ".$products[2]["price"].".<br>";
echo $products[3]["name"]." Price: ".$products[3]["price"].".<br>";
echo $products[4]["name"]." Price: ".$products[4]["price"].".<br>";

?>