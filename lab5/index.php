
<?php
require_once 'class.php';

$product1 = new Product("Ноутбук", "Модель HP EliteBook 840 G7", 1500);
$product2 = new Product("Смартфон", "Модель iPhone 12", 1000);

$discountedProduct1 = new DiscountedProduct("Телевізор", "Модель Samsung Smart TV", 2000, 20);
$discountedProduct2 = new DiscountedProduct("Навушники", "Модель Sony WH-1000XM4", 350, 15);

echo $product1->getInfo();
echo "<br>";
echo $product2->getInfo();
echo "<br>";
echo $discountedProduct1->getInfo();
echo "<br>";
echo $discountedProduct2->getInfo();
?>

<?php
$electronics = new Category("Електроніка");

$electronics->addProduct($product1);
$electronics->addProduct($discountedProduct1);

$electronics->showProducts();
?>

