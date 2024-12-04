<?php
class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $description, $price) {
        $this->name = $name;
        $this->description = $description;
        $this->setPrice($price);
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("Price cannot be negative");
        }
        $this->price = $price;
    }

    public function getInfo() {
        return "Назва: {$this->name}<br>Ціна: {$this->price}<br>Опис: {$this->description}<br>";
    }
}

class DiscountedProduct extends Product {
    private $discount;

    public function __construct($name, $description, $price, $discount) {
        parent::__construct($name, $description, $price);
        $this->discount = $discount;
    }

    public function getDiscountedPrice() {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getInfo() {
        $discountedPrice = $this->getDiscountedPrice();
        return "Назва: {$this->name}<br>Ціна: {$this->price} (без знижки)<br>Знижка: {$this->discount}%<br>Ціна зі знижкою: {$discountedPrice}<br>Опис: {$this->description}<br>";
    }
}

class Category {
    public $categoryName;
    private $products = [];

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function showProducts() {
        echo "<h3>Категорія: {$this->categoryName}</h3>";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "<br>";
        }
    }
}



