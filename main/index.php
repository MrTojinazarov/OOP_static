<?php
include 'Product.php';

echo '<pre>';
print_r(Product::getAll());
echo '</pre>';
echo "<br>";
echo '<pre>';
print_r(Product::Show(29));
echo '</pre>';

Product::Delete(29);

?>