<?php
echo "<div class='row container justify-center'>";
echo "<div class='col-md-6' id='product-img'>";
$imageDirectory = "./view/Uploads/" . $image;
echo "<img src='{$imageDirectory}' style='width:80%;' />";
echo "</div>";
echo "<div class='col-md-4'>";

echo "<div class='product-detail'>Giá Bán:</div>";
echo "<h4 class='m-b-10px price-description'>" . $giaBan . "</h4>";

echo "<div class='product-detail'>Product description:</div>";

echo "<div class='m-b-10px'>";
// make html
$page_description = htmlspecialchars_decode(htmlspecialchars_decode($moTa));

// show to user
echo $page_description;
echo "</div>";
echo "</div>";
// echo "<div class='product-detail'>Product category:</div>";
// echo "<div class='m-b-10px'>{$product->category_name}</div>";
echo "<div class='col-md-2'>";

// if product was already added in the cart


// if product was not added to the cart yet


echo "<form class='add-to-cart-form'>";
// product id


echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' /><br>";

// enable add to cart button
echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
echo "<span class='glyphicon glyphicon-shopping-cart mb-3'></span> Add to cart";
echo "</button>";

echo "</form>";

echo "</div>";

echo "</div>";
echo "</div>";
